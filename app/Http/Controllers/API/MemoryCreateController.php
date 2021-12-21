<?php

namespace App\Http\Controllers\API;


use App\Mail\FriendMemoryRequestMail;
use App\Mail\FriendMemorySubmittedMail;
use App\Mail\MemorySharedMail;
use App\Models\Memory;
use App\Models\MemoryFavorites;
use App\Models\MemoryFriends;
use App\Models\MemoryNotifications;
use App\Models\MemorySpecialDates;
use App\Models\MemoryVisibility;
use App\Models\User;
use App\Rules\IsMD5;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use Validator;
/**
 * @group Memory create management
 *
 * APIs for Memory create
 */
class MemoryCreateController extends APIBaseController
{


	function add(Request $request)
	{
		$validator = Validator::make($request->all(), ['name' => 'required|string|max:255','loving'=>'string|max:255']);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		if($request->has('memory_access_token'))
		{
			$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
			if($memory) {
				$update=false;
				if($memory->name!=$request->get('name'))
				{
					$update=true;
					$memory->name=$request->get('name');
				}

				if($memory->loving!=$request->get('loving'))
				{
					$update=true;
					$memory->loving=$request->get('loving');
				}

				if($update)
					$memory->save();

				$this->assignDraftModeIfChanged($memory);
			}
		}

		else
		{
			$memory=Memory::create(['name'=>$request->get('name'),'loving'=>$request->get('loving'),'user_id'=>Auth::id(),'access_token'=>$this->generateAccessToken()]);
		}
		//$memory=Memory::updateOrCreate(['access_token'=>$request->get('memory_access_token')],['name'=>$request->get('name'),'loving'=>$request->get('loving'),'user_id'=>Auth::id(),'access_token'=>$this->generateAccessToken()]);

		$response = ['memory_access_token' => $memory->access_token,'message'=>'Created Successfully'];

		return response($response);
	}

	function addDescription(Request $request)
	{
		$validator = Validator::make($request->all(), ['memory_access_token' => 'required|string','description'=>'required|string']);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		//find or fail
		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		if($memory)
		{
			$memory->description =$request->get('description');
			$memory->save();
			$this->assignDraftModeIfChanged($memory);

			$response = ['message'=>'Description  created Successfully'];
			return response($response);
		}
	}

	function addFavoriteMemory(Request $request)
	{
		$validator = Validator::make($request->all(), [
			"favorites"  => "required|array|distinct|min:1",
			"favorites.*"  => "required|array|distinct|min:2",
		]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		$folder   = "memories/images/" . $request->get('memory_access_token') . "/favourites/";
		//remove it from aws
		Storage::deleteDirectory($folder);
		//remove any favorites before
		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		MemoryFavorites::where('memory_id',$memory->id)->delete();

		//create folder if not exists

		//$folder=$this->createDir($folder);

		$favorites=$request->get('favorites');

		foreach((array)$favorites as $key=>$favorite)
		{
			/*$fileName = time() . '.' . $favorite['image']->getClientO riginalExtension();
			$favorite['image']->move($folder,$fileName);
			$name=$favorites_names[$key]['name'];*/
			$file=$folder.time() . '.jpeg';
			//Image::make(file_get_contents($favorite['image']))->save($file);
			$avatar = Image::make($favorite['image'])->stream();
			Storage::put($file, $avatar);
			MemoryFavorites::create(['memory_id'=>$memory->id,'name'=>$favorite['name'],'image'=>$file]);
		}

		$memory->visible_type='draft';
		$memory->save();

		$response = [ 'message' => 'Favorites created Successfully' ];
		return response($response);
	}


	function addSpecialDates(Request $request)
	{

		$validator = Validator::make($request->all(), [
			"special_dates"  => "required|array|distinct|min:1",
			"special_dates.*"  => "required|array|distinct|min:2",
			"special_dates.*.date"  => "required|date|date_format:Y-m-d",
			"memory_reminder"=>'boolean',
			'memory_access_token'=>'required|string'
		]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		if($memory)
		{
			$memory_reminder=0;
			if($request->has('memory_reminder'))
				$memory_reminder=1;
			$memory->reminder =$memory_reminder;
			$memory->save();
		}

		//remove any favorites before
		MemorySpecialDates::where('memory_id',$memory->id)->delete();
		$special_dates=$request->get('special_dates');
		foreach((array)$special_dates as $key=>$special_date)
		{
			MemorySpecialDates::create(['memory_id'=>$memory->id,'name'=>$special_date['name'],
			                            'date'=>$special_date['date']]);
		}

		$response = [ 'message' => 'Special dates created Successfully' ];
		return response($response);
	}



	function addTheme(Request $request)
	{
		$validator = Validator::make($request->all(), ['memory_access_token' => 'required|string','theme_color'=>'required|string']);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}


		//find or fail
		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		if($memory)
		{
			$memory->theme_color =$request->get('theme_color');
			$memory->save();
			$response = ['message'=>'theme color  created Successfully'];
			return response($response);
		}
	}


	function addVisibility(Request $request)
	{
		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string','visibility'=>'required|string|in:public,private',
			 "memory_reminder"=>'boolean',
			 "receive_afsp_resources"=>'boolean',
			 "invites"  => "required_if:visibility,private|array",
			]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		//find or fail
		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		if($memory)
		{


			$invites=$request->get('invites');

			foreach((array)$invites as $invite)
			{
				//
				/** @var \App\Models\User $logged_user */
				$logged_user=Auth::User();
				$logged_user_email=$logged_user->email;
				if (filter_var($invite, FILTER_VALIDATE_EMAIL))
				{
					$access_token=$this->generateAccessToken();
					$memory_detail['name']=$memory->name;
					$memory_detail['logged_user_email']=$logged_user_email;
					$memory_detail['cover_image']=$this->circleImage($memory->getAttributes()['thumbnail']);;
					$memory_detail['email']=$invite;
					$memory_detail['access_token']=$access_token;
					$memory_detail['loving']=$memory->loving;
					$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);
//					\Mail::to($invite)->send(new MemorySharedMail($memory_detail));
					dispatch(new \App\Jobs\SendMailJob('MemorySharedMail',$memory_detail));
					MemoryVisibility::firstOrCreate(['email'=>$invite,'memory_id'=>$memory->id],['email'=>$invite,'memory_id'=>$memory->id,'access_token'=>$access_token]);

				}
			}
			//save user global settings
			$memory_reminder=0;
			$receive_afsp_resources=0;
			if($request->get('memory_reminder')==1)
			{
				$memory_reminder=1;
			}
			if($request->get('receive_afsp_resources')==1)
			{
				$receive_afsp_resources=1;
			}
			$user=Auth::User();
			$user->receive_afsp_resources=$receive_afsp_resources;
			$user->all_memory_reminder=$memory_reminder;
			$user->save();

			$this->submitForApproval($memory->id,$request->visibility);

			$response = ['message'=>'submitted Successfully','data'=>$this->memoryFetchQuickData($memory)];
			return response($response);
		}
	}
	function submit(Request $request)
	{

		$validator = Validator::make($request->all(), ['memory_access_token' => 'required|string']);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		//find or fail
		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		$this->submitForApproval($memory->id);

		$response = ['message'=>'submitted Successfully','data'=>$this->memoryFetchQuickData($memory)];
		return response($response);
	}

	function submitForApproval($memory_id,$visibility)
	{

		$memory=Memory::findOrFail($memory_id);
		$notification_type_id=1;
		$mail_file="MemorySubmittedMail";

		if($memory->status_id>2)
		{
			//check any update happend
			if($memory->visible_type=='draft')
			{
				$notification_type_id=2;
				$mail_file="MemoryReSubmittedMail";
				$memory->visible_type=$visibility;
				$memory->status_id = 2;
				$memory->save();
			}
			else
				$mail_file="";
		}
		else
		{
			$memory->visible_type=$visibility;
			$memory->status_id = 2;
			$memory->save();
		}

		$user_id=Auth::ID();
		//memory submitted
		$this->createMemoryNotification(['memory_id'=>$memory_id,'user_to_notify'=>$user_id,'type_id'=>$notification_type_id,'user_who_fired_event'=>$user_id]);
		//send mail to user
		if($mail_file)
		{
			$thumbnail_path=$memory->getAttributes()['thumbnail'];
			$cover_with_icon=str_replace("_thumbnail","_cover_with_submitted_icon",$thumbnail_path);
			$return_path=$cover_with_icon;

			$this->circleImageWithIcon($thumbnail_path,public_path('images/icon-memory-submitted.png'),$return_path);

			$memory_detail['name']=$memory->name;
			$memory_detail['cover_image']=Storage::temporaryUrl(
				$return_path,
				now()->addWeek(1),
				['ResponseContentType' => 'application /octet-stream']
			);;
			$memory_detail['loving']=$memory->loving;
			$memory_detail['email']=Auth::User()->email;
			$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);

			dispatch(new \App\Jobs\SendMailJob($mail_file,$memory_detail));

		}


	}
}
