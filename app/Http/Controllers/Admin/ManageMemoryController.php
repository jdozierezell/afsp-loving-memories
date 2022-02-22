<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Models\Memory;
use App\Models\MemoryAdminPreview;
use App\Models\MemoryFriends;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use URL;
use Validator;
use Intervention\Image\ImageManager;

class ManageMemoryController extends APIBaseController
{

	private $imageManager;

	public function __construct(ImageManager $imageManager ){
		$this->imageManager = $imageManager;
	}


/**
	 * Show the application dashboard.
	 *
	 * @return Renderable
	 */
	public function index()
	{
		return view('admin/memories');
	}


	function single(Memory $memory)
	{

		$memory=Memory::with(['photos','favorites','specialDates','friends','sharedVisibility'])->where('id',$memory->id)->first();
		$preview_url=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.admin-preview-memory'),'access_token',$memory->access_token);

		return view('admin/memory-single',compact('memory','preview_url'));
	}


	function approve(Request $request)
	{
		$validator = Validator::make($request->all(),
			['id' => 'required']);
		if ($validator->fails())
		{
			return back()->with('error','You are not allowed to access this page.');
		}

		$memory=Memory::findOrFail($request->id);
		$memory->status_id=3;
		$memory->save();


		//create notification for user its approve
		//user_id will be admin
		$this->createMemoryNotification(['memory_id'=>$memory->id,'user_to_notify'=>$memory->user_id,'type_id'=>2,'user_who_fired_event'=>1],$memory->user_id);

		$thumbnail_path=$memory->getAttributes()['thumbnail'];
		$cover_with_icon=str_replace("_thumbnail","_cover_with_approve_icon",$thumbnail_path);
		$return_path=$cover_with_icon;
		$this->circleImageWithIcon($thumbnail_path,public_path('images/icon-memory-approved.png'),$return_path);

		$memory_detail['name']=$memory->name;
		$memory_detail['cover_image']=Storage::temporaryUrl(
			$return_path,
			now()->addWeek(1),
			['ResponseContentType' => 'application /octet-stream']
		);;
		$memory_detail['loving']=$memory->loving;
		$memory_detail['email']=$memory->user->email;
		$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);;
		$memory_detail['edit_link']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.edit-memory'),'access_token',$memory->access_token);;
		dispatch(new \App\Jobs\SendMailJob('MemoryApprovedMail',$memory_detail));

		return back()->with('success','Memory Approved');
	}

	function delete(Request $request)
	{
		$validator = Validator::make($request->all(),
			['id' => 'required']);
		if ($validator->fails())
		{
			return back()->with('error','You are not allowed to access this page.');
		}

		$memory=Memory::findOrFail($request->id);
		$memory->active=0;
		$memory->save();


		//create notification for user its approve
		//user_id will be admin
		$this->createMemoryNotification(['memory_id'=>$memory->id,'user_to_notify'=>$memory->user_id,'type_id'=>2,'user_who_fired_event'=>1],$memory->user_id);

		/*$thumbnail_path=$memory->getAttributes()['thumbnail'];
		$cover_with_icon=str_replace("_thumbnail","_cover_with_approve_icon",$thumbnail_path);
		$return_path=$cover_with_icon;
		$this->circleImageWithIcon($thumbnail_path,public_path('images/icon-memory-approved.png'),$return_path);

		$memory_detail['name']=$memory->name;
		$memory_detail['cover_image']=Storage::temporaryUrl(
			$return_path,
			now()->addWeek(1),
			['ResponseContentType' => 'application /octet-stream']
		);;


		$memory_detail['loving']=$memory->loving;
		$memory_detail['email']=$memory->user->email;
		$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);;
		$memory_detail['edit_link']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.edit-memory'),'access_token',$memory->access_token);;
		dispatch(new \App\Jobs\SendMailJob('MemoryDeletedMail',$memory_detail));*/

		return back()->with('warning','Memory Deleted');
	}
	function restore(Request $request)
	{
		$validator = Validator::make($request->all(),
			['id' => 'required']);
		if ($validator->fails())
		{
			return back()->with('error','You are not allowed to access this page.');
		}

		$memory=Memory::findOrFail($request->id);
		$memory->active=1;
		$memory->save();


		//create notification for user its approve
		//user_id will be admin
		$this->createMemoryNotification(['memory_id'=>$memory->id,'user_to_notify'=>$memory->user_id,'type_id'=>2,'user_who_fired_event'=>1],$memory->user_id);

		return back()->with('success','Memory Restored');
	}

	function reject(Request $request)
	{
		$validator = Validator::make($request->all(),
			['id' => 'required','reject_reason'=>'required']);
		if ($validator->fails())
		{
			return back()->withInput($request->input())
				->withErrors($validator->errors());
		}

		$memory=Memory::findOrFail($request->id);
		$memory->status_id=4;
		$memory->save();
		$this->createMemoryNotification(['memory_id'=>$memory->id,'user_to_notify'=>$memory->user_id,'type_id'=>3,'user_who_fired_event'=>1],$memory->user_id);


		//send mail
		$memory_detail['name']=$memory->name;
		$memory_detail['email']=$memory->user->email;
		$memory_detail['reject_reason']=$request->reject_reason;
		$memory_detail['cover_image']=$this->circleImage($memory->getAttributes()['thumbnail']);;
		$memory_detail['loving']=$memory->loving;
		$memory_detail['email']=$memory->user->email;
		$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);;
		dispatch(new \App\Jobs\SendMailJob('MemoryRejectedMail',$memory_detail));

		return back()->with('warning','Memory Rejected');
	}

	function preview(Request $request)
	{
		$validator = Validator::make($request->all(),
			['id' => 'required']);
		if ($validator->fails())
		{
			return back()->with('error','You are not allowed to access this page.');
		}

		$memory=Memory::findOrFail($request->id);
		//create admin token url
		$temp_token=$this->generateAccessToken();
		MemoryAdminPreview::updateOrCreate(['memory_id'=>$memory->id],
		['memory_id'=>$memory->id,'access_token'=>$temp_token,'expire_at'=>Carbon::now()->addMinutes(30)]);

		$url=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.admin-preview-memory'),'access_token',$temp_token);


		return response(['url'=>$url]);

	}

	function friendMemoryApprove(Request $request)
	{

		$validator = Validator::make($request->all(),
			['friend_memory_id' => 'required']);
		if ($validator->fails())
		{
			return back()->with('error','You are not allowed to access this page.');
		}

		$memory_friend=MemoryFriends::findOrFail($request->friend_memory_id);
		$memory_friend->verified=2;//approved by admin
		$memory_friend->save();

		$memory=Memory::findOrFail($memory_friend->memory_id);

		//create notification for user its approved
		$this->createMemoryNotification(['memory_id'=>$memory->id,'user_to_notify'=>$memory->user_id,'type_id'=>2,'user_who_fired_event'=>1],$memory->user_id);
		$memory_detail['name']=$memory->name;
		$memory_detail['cover_image']=$this->circleImage($memory->getAttributes()['thumbnail']);;
		$memory_detail['loving']=$memory->loving;
		$memory_detail['email']=$memory->user->email;
		$memory_detail['friend_email']=$memory_friend->email;
		$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);;

		//memory author
		dispatch(new \App\Jobs\SendMailJob('FriendMemoryApprovedMail',$memory_detail));

		//contributor
		$memory_detail['email']=$memory_friend->email;
		dispatch(new \App\Jobs\SendMailJob('FriendMemoryApprovedMail',$memory_detail));

		return back()->with('success','Friend Memory Approved');
	}



}
