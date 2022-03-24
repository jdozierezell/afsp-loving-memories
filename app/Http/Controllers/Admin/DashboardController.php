<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Controllers\Controller;
use App\Mail\SendEmailDemo;
use App\Models\Memory;
use App\Models\MemoryPhotos;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Storage;

class DashboardController extends APIBaseController
{


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		/*$memories=Memory::where('id','>=','7189')->get();

		$html="<table cellpadding='5' cellspacing='5' width='100%'>";
		foreach($memories as $memory)
		{
			$html .="<tr>
						<td>".$memory->id."</td>
						<td><img src='".$memory->thumbnail."' width='100'></td>
					</tr>";

		}

		$html .="</table>";

		echo $html;
		die();*/


		//$this->reImportOldData();
		/*$memory=Memory::where('access_token','2f4a41bb2e750169f6f9ff2e6922d9cd')->firstOrFail();
		$thumbnail_path=$memory->getAttributes()['thumbnail'];
		$cover_with_icon=str_replace("_thumbnail","_cover_with_submitted_icon",$thumbnail_path);
		$return_path=$cover_with_icon;

		$this->circleImageWithIcon($thumbnail_path,public_path('images/icon-memory-submitted.png'),$return_path);
		$img_path=Storage::temporaryUrl(
			$return_path,
			now()->addWeek(1),
			['ResponseContentType' => 'application /octet-stream']
		);;
		return Image::make($img_path)->response();
dd($return_path);*/
		$memories = Memory::withoutGlobalScopes()->get();
		$total = $memories->count();
		$draft = $memories->where('status_id', '1')->count();
		$submitted = $memories->where('status_id', '2')->count();
		$approved = $memories->where('status_id', '3')->count();
		$rejected = $memories->where('status_id', '4')->count();

		return view('admin/dashboard',compact('total','draft','submitted','approved','rejected'));
	}

	function saveImages()
	{
		$file = public_path('old-data-2.csv');

		$customerArr = $this->csvToArray($file,':');

		for ($i = 0; $i < count($customerArr); $i ++)
		{
			$folder   = "memories/images-old/" . $customerArr[$i]['ID']. "/";


			if(!Storage::exists($folder))
			{

				$file_url=$customerArr[$i]['Quilt Image'];

				if(filter_var($customerArr[$i]['Quilt Image'], FILTER_VALIDATE_URL))
				{
					try {
						$fileName = uniqid() . '.' . pathinfo($file_url, PATHINFO_EXTENSION);
						$full_image = Image::make($file_url);
						Storage::disk('local')->put($folder.$fileName, $full_image->stream()->__toString());
					}
					catch (\Exception $exception)
					{
						dump($customerArr[$i]['ID']);
						dump($exception->getMessage());
						dump($file_url);

					}

				}
			}



		}
		dd('done');
	}

	function importOldData()
	{

		$file = public_path('old-data-2.csv');

		$customerArr = $this->csvToArray($file,':');

		for ($i = 0; $i < count($customerArr); $i ++)
		{

			if( $customerArr[$i]['Your Email Address'] )
			{
				$import_data[$i]['is_imported']=1;
				$import_data[$i]['password']=Hash::make(substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#$%^&*", 5)), 0, 10));
				$import_data[$i]['email_verified_at'] = date("Y-m-d H:i:s");
				$import_data[$i]['email'] = $customerArr[$i]['Your Email Address'];
				$import_data[$i]['name'] = $customerArr[$i]['Your Name'];


				$user = User::where('email',$import_data[$i]['email'])->first();
				if(!$user)
					$user=User::create($import_data[$i]);


				if( $customerArr[$i]['Title'] )
				{
					$memory_exist=true;
					$memory = Memory::where(['name'=>$customerArr[$i]['Title'],'user_id'=>$user->id])->first();
					if(!$memory)
					{
						$memory_exist=false;
						$memory=Memory::create(['name'=>$customerArr[$i]['Title'],'user_id'=>$user->id,'status_id'=>3,
									'description'=>  strip_tags($customerArr[$i]['Quilt Description']) ,'access_token'=>$this->generateAccessToken()]);
					}
				}
				if($memory_exist===false)
				{
					$access_token=$memory->access_token;
					if(filter_var($customerArr[$i]['Quilt Image'], FILTER_VALIDATE_URL))
					{
						$uploaded_file=$this->uploadMediaFile($access_token,$customerArr[$i]['Quilt Image']);
						MemoryPhotos::create(['memory_id'=>$memory->id,'image'=>$uploaded_file,'cover'=>1]);

						$parse_url=parse_url($uploaded_file);
						$local_image_path= ltrim($parse_url['path'], '/');
						$path_info=pathinfo($local_image_path);
						$thumbnail=$path_info['dirname']."/".$path_info['filename']."_thumbnail.".$path_info['extension'];
						$memory->cover_image =$local_image_path;
						$memory->thumbnail =$thumbnail;
						$memory->visible_type='public';
						$memory->save();
					}
				}


			}

		}



	}

	function csvToArray($filename = '', $delimiter = ':')
	{
		if (!file_exists($filename) || !is_readable($filename))
			return false;

		$header = null;
		$data = array();
		if (($handle = fopen($filename, 'r')) !== false)
		{
			$i=1;
			while (($row = fgetcsv($handle, 1000000, $delimiter)) !== false)
			{
				if($row)
				{
					if (!$header)
						$header = $row;
					else
					{
						if(count($header) == count($row)){
							$data[$row[0]] = array_combine($header, $row);


						}
						else
						{
							dump($row);
						}
					}
				}

				$i++;

			}
			fclose($handle);
		}

		return $data;
	}

	function    uploadMediaFile($memory_access_token,$file_url,$org_file_url)
	{
		/** @var Request $request */


			$folder   = "memories/images/" . $memory_access_token;
			$time=uniqid();

			$flag = true;
			$try = 1;
			$thumbnail=$folder.'/'.$time.'_thumbnail.'.pathinfo($file_url, PATHINFO_EXTENSION);
			while ($flag && $try <= 3):
				try {
					$full_image = Image::make($file_url);

					$imgThumb =$full_image->resize(200, 200)->stream();
					Storage::put($thumbnail, $imgThumb->__toString() );
					$flag = false;
				} catch (\Exception $e) {
					//not throwing  error when exception occurs
				}
				$try++;
			endwhile;


			$flag = true;
			$try = 1;
			$fileName = $time . '.' . pathinfo($org_file_url, PATHINFO_EXTENSION);

			while ($flag && $try <= 3):
				try {

					$full_image = Image::make($org_file_url);
					Storage::put($folder.'/'.$fileName, $full_image->stream()->__toString());
					$flag = false;
				} catch (\Exception $e) {
					//not throwing  error when exception occurs
				}
				$try++;
			endwhile;


			return array('thumbnail'=>$thumbnail,'cover'=>$folder.'/'.$fileName);


	}

	function reImportOldData()
	{




		$file = public_path('old-data-2.csv');

		$customerArr = $this->csvToArray($file,':');
$i=0;
		$log_file='memories/logs.txt';
		if(file_exists($log_file))
		{
			unlink($log_file);
		}
		$runned_ids=[];
		$di = new RecursiveDirectoryIterator('memories/images-old');
		foreach (new RecursiveIteratorIterator($di) as $filename => $file) {

			if($file->getFileName()!="." &&  $file->getFileName()!="..")
			{
				$path_data=explode("\\",$file->getPath());

				$file_info=pathinfo($file->getFileName());
				$img_file_name=$file_info['filename'].".jpg";

				$edited_file=public_path("memories/images-edited/".$img_file_name);
				$original_file=public_path("memories/images-old/".$path_data[1]."/".$file->getFileName());
				if(!file_exists($edited_file) &&  !file_exists($original_file))
				{
					file_put_contents($log_file, "$i - ".$file->getPathName()."-".$original_file.PHP_EOL , FILE_APPEND | LOCK_EX);
				}
				else
				{

					//$customerArr[]


					if(!in_array($path_data[1],$runned_ids))
					{
						$runned_ids[]=$path_data[1];
						$import_data=$customerArr[$path_data[1]];
						$memory_exist=true;
						$user = User::where('email',$import_data['Your Email Address'])->first();
						$memory=Memory::where(['name'=>$import_data['Title'],'user_id'=>$user->id])->first();
						if(!$memory)
						{
							if( $import_data['Title'] )
							{

								if(!$memory)
								{
									$memory_exist=false;
									$memory=Memory::create(['name'=>$import_data['Title'],'user_id'=>$user->id,'status_id'=>3,
									                        'description'=>$import_data['Quilt Description'],'access_token'=>$this->generateAccessToken()]);
								}
							}
							if($memory_exist===false)
							{
								//$org_file="memories/images-old/".$file->getFileName();

								$uploaded_file=$this->uploadMediaFile($memory->access_token,$edited_file,$original_file);

								MemoryPhotos::create(['memory_id'=>$memory->id,'image'=>$uploaded_file['cover'],'cover'=>1]);



								$memory->cover_image =$uploaded_file['cover'];
								$memory->thumbnail =$uploaded_file['thumbnail'];
								$memory->visible_type='public';
								$memory->save();

								$memory=Memory::where(['name'=>$import_data['Title'],'user_id'=>$user->id])->first();



							}
						}




					}
				}




			}
			$i++;


		}



	dd('done');



	}

}
