<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Memory;
use App\Models\MemoryFriends;
use App\Models\MemoryNotifications;
use App\Models\MemoryPhotos;
use App\Models\MemoryVideos;
use App\Models\User;
use Auth;
use File;
use http\Exception;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use Validator;

class APIBaseController extends Controller
{


	function validatorFailResponse($validator)
	{
		return response(['error'=>$validator->errors()], 422);
	}


	/**
	 * @param Request $request
	 * @param $field
	 *
	 * @return bool|string
	 */
	function    uploadMedia(Request $request,$field)
	{
		/** @var Request $request */
		if($request->has($field) )
		{
			$folder   = "memories/".$field."s/" . $request->get( 'memory_access_token' ) . "/";
			$this->createDir($folder);
			$media    = $request->file( $field );
			$time=time();
			$thumbnail=$folder.'/'.$time.'_thumbnail.'.$media->extension();
			/*$img = Image::make($media->path());
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			})->save($thumbnail);*/

			$imgThumb = Image::make($media)->resize(200, 200)->stream();
			Storage::put($thumbnail, $imgThumb->__toString() );



			/** @var \Illuminate\Http\UploadedFile $media */

			$fileName = $time . '.' . $media->getClientOriginalExtension();
			/** @var \Illuminate\Http\UploadedFile $file */
			//$file = $request->file($field);
			//$file->move($folder, $fileName);
			$full_image = Image::make($media)->stream();
			Storage::put($folder.$fileName, $full_image->__toString());

			/*if($request->has('image') )
			{
				//$media = Image::make( $media->getRealPath() );
				$media->save($folder . $fileName );
			}
			elseif ($request->has('video'))
			{
				$file = $request->file('video');
				$file->move($folder, $fileName);
			}*/
			//Storage::put($folder.$fileName, $img->encode());
			return $folder . $fileName;
		}
		return false;
	}

	function createDir($folder)
	{
		$folder=trim($folder);
		if(substr($folder, -1)!='/')
			$folder .="/";
		if (!file_exists(public_path($folder))) { //Verify if the directory exists
			mkdir(public_path($folder), 0755, true); //create it if do not exists
		}

		return $folder;
	}


	function generateAccessToken()
	{
		return  md5(uniqid(rand(), true));
	}

	function isValidMd5($md5 ='')
	{
		return preg_match('/^[a-f0-9]{32}$/', $md5);
	}

	function memoryFetchQuickData($memory,$inlude_pending_memory=false)
	{
		$return_data['name']=$memory->name;
		$return_data['cover_image']=$memory->cover_image;
		$return_data['thumbnail']=$memory->thumbnail;
		//pending friend memory
		if($inlude_pending_memory)
			$return_data['pending_friend_memory'] = MemoryFriends::whereIn ('verified',[0,1])->count();
		return $return_data;
	}



	function createMemoryNotification($data,$user_id=0)
	{
		//create notification for user memory submitted
		MemoryNotifications::create($data);
		//increase notification count
		if($user_id)
		{
			$user=User::find($user_id);
		}
		else
		{
			$user=Auth::User();
		}

		if (!$user) {
			throw new ModelNotFoundException('User not found');
		}

		$user->increment('notification_count');
	}

	function replaceURLPrams($route,$field,$value)
	{
		return str_ireplace("{:$field}",$value,$route,$count);
	}

	function getNameFromEmail($email)
	{
		return substr($email, 0, strrpos($email, '@'));
	}

	function assignDraftModeIfChanged($memory,$force=false)
	{
		if(!($memory->wasRecentlyCreated && $memory->wasChanged() && $memory->visible_type!='draft') || $force){
			// performed an update
			$memory->visible_type='draft';
			$memory->save();
		}
	}

	function getPaginationFromRequest($request)
	{
		$page = $request->has('page') ? $request->get('page') : 1;
		$limit = $request->has('limit') ? $request->get('limit') : 30;
		$offset=($page - 1) * $limit;

		return [$offset,$limit];
	}
	function circleImage($file_path)
	{

		$cover_with_icon=str_replace("_thumbnail","_thumbnail_circled",$file_path);
		$return_path=$cover_with_icon;

		if( Storage::exists($return_path))
		{
			return $return_path;
		}
		// Step 1 - Start with image as layer 1 (canvas).
		$img1 = ImageCreateFromString(Storage::get($file_path));
		$x=imagesx($img1);
		$y=imagesy($img1);

		// Step 2 - Create a blank image.
		$img2 = imagecreatetruecolor($x, $y);
		$bg = imagecolorallocate($img2, 255, 255, 255); // white background
		imagefill($img2, 0, 0, $bg);
		// Step 3 - Create the ellipse OR circle mask.
		$e = imagecolorallocate($img2, 0, 0, 0); // black mask color
		// Draw a ellipse mask
		// imagefilledellipse ($img2, ($x/2), ($y/2), $x, $y, $e);
		// OR
		// Draw a circle mask
		$r = $x <= $y ? $x : $y; // use smallest side as radius & center shape
		imagefilledellipse ($img2, ($x/2), ($y/2), $r, $r, $e);
		// Step 4 - Make shape color transparent
		imagecolortransparent($img2, $e);
		// Step 5 - Merge the mask into canvas with 100 percent opacity
		imagecopymerge($img1, $img2, 0, 0, 0, 0, $x, $y, 100);
		// Step 6 - Make outside border color around circle transparent
		imagecolortransparent($img1, $bg);

		//Adjust paramerters according to your image

		//	imagepng($img1,$return_path);
		$imgThumb = Image::make($img1)->stream();
		Storage::put($return_path, $imgThumb->__toString() );

		return Storage::temporaryUrl(
			$return_path,
			now()->addWeek(),
			['ResponseContentType' => 'application /octet-stream']
		);


	}

	function circleImageWithIcon($file_path,$icon_file,$return_path)
	{
		if( Storage::exists($return_path))
		{
				return $return_path;
		}



		// Step 1 - Start with image as layer 1 (canvas).
		$icon_image= ImageCreateFromString(file_get_contents($icon_file));
		$img1 = ImageCreateFromString(Storage::get($file_path));
		$x=imagesx($img1) ;
		$y=imagesy($img1);

		// Step 2 - Create a blank image.
		$img2 = imagecreatetruecolor($x, $y);
		$bg = imagecolorallocate($img2, 255, 255, 255); // white background
		imagefill($img2, 0, 0, $bg);
		// Step 3 - Create the ellipse OR circle mask.
		$e = imagecolorallocate($img2, 0, 0, 0); // black mask color
		// Draw a ellipse mask
		// imagefilledellipse ($img2, ($x/2), ($y/2), $x, $y, $e);
		// OR
		// Draw a circle mask
		$r = $x <= $y ? $x : $y; // use smallest side as radius & center shape
		imagefilledellipse ($img2, ($x/2), ($y/2), $r, $r, $e);
		// Step 4 - Make shape color transparent
		imagecolortransparent($img2, $e);
		// Step 5 - Merge the mask into canvas with 100 percent opacity
		imagecopymerge($img1, $img2, 0, 0, 0, 0, $x, $y, 100);
		// Step 6 - Make outside border color around circle transparent
		imagecolortransparent($img1, $bg);

		//Adjust paramerters according to your image
		$this->imagecopymerge_alpha($img1, $icon_image, imagesx($img2)-50, 10, 0, 0, imagesx($icon_image), imagesy($icon_image), 100);



		//	imagepng($img1,$return_path);
		$img=Image::make($img1);

		$img->resizeCanvas(220, 220, 'center', false, '#ffffff');


		//$imgThumb = Image::make($img1)->stream();

		$imgThumb = $img->stream();
		Storage::put($return_path, $imgThumb->__toString() );


	}

	function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
		// creating a cut resource
		$cut = imagecreatetruecolor($src_w, $src_h);
		$color = imagecolorallocatealpha($cut, 255, 255, 255, 127); //fill transparent back
		imagefill($cut, 0, 0, $color);

		// copying relevant section from background to the cut resource
		imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
		// copying relevant section from watermark to the cut resource
		imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
		// insert cut resource to destination image
		imagecopymerge($dst_im, $cut, $dst_x, $dst_y, 0, 0, $src_w, $src_h, $pct);


	}
	function getMaxUploadSize()
	{
		return $this->return_bytes((ini_get('upload_max_filesize')));
	}
	function return_bytes($val)
	{
		$val  = trim($val);

		if (is_numeric($val))
			return $val;

		$last = strtolower($val[strlen($val)-1]);
		$val  = substr($val, 0, -1); // necessary since PHP 7.1; otherwise optional

		switch($last) {
			// The 'G' modifier is available since PHP 5.1.0
			case 'g':
				$val *= 1024;
			case 'm':
				$val *= 1024;
			case 'k':
				$val *= 1024;
		}

		return $val;
	}
}
