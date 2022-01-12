<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Memory;
use App\Models\MemoryFriends;
use App\Models\MemoryNotifications;
use App\Models\User;
use App\Rules\IsMD5;
use Illuminate\Http\Request;
use Auth;
use Validator;
/**
 * @group Memory Notifications management
 *
 * APIs for Memory Notifications
 */
class MemoryNotificationController extends APIBaseController
{
	//

	function  latest(Request $request)
	{
		$user_id=Auth::Id();
		list($offset,$limit)=$this->getPaginationFromRequest($request);
		$notifications=MemoryNotifications::with('memory')->where('user_to_notify',$user_id)->offset($offset)->limit($limit)->get();
		$data=array();
		foreach($notifications as $notification)
		{
			$data[]=$this->formatNotificationMessage($notification);
		}
		$response = ['notifications' => $data];
		return response($response);
	}

	function formatNotificationMessage($notification)
	{
		$notify=array();
		if($notification)
		{
			$memory=$notification->memory;

			$notify['ago']=$notification->created_at->diffForHumans();;
			$notify['thumbnail']=url($memory->thumbnail);
			$notify['btn_text']='View';
			$notify['id']=$notification->id;
			$notify['read']=$notification->read;
			if($notification->friend_memory_id)
			{
				$friend_memory=MemoryFriends::where('id',$notification->friend_memory_id)->first();
			}

			switch ($notification->type_id)
			{

				case 1:  //memory submitted
				{
					$notify['text']="<b> ".$memory->name." </b> has been submitted for review";
					$notify['url']=$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);
					break;
				}
				case 2:  //memory approved
				{
					$notify['text']="<b> ".$memory->name." </b> has been approved";
					$notify['url']=$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);
					break;
				}
				case 3:  //memory rejected
				{
					$notify['text']="<b> ".$memory->name." </b> has been declined";
					$notify['url']=$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);
					break;
				}
				case 4: //memory friend submitted
				{
					if(isset($friend_memory))
					{
						$notify['text']="<b> ".$friend_memory->name." </b> has submitted a memory for "."<b> ".$memory->name." </b>";
						$notify['url']=$this->replaceURLPrams(config('frontendRoutes.review-friend-memory'),'access_token',$friend_memory->access_token);
					}
					$notify['btn_text']='Review';
					break;
				}
				case 5: //memory friend approved by owner
				{
					if(isset($friend_memory))
					{
						$notify['text']="<b> ".$friend_memory->name." </b> memory approved by you waiting for admin to review";
						$notify['url']=$this->replaceURLPrams(config('frontendRoutes.review-friend-memory'),'access_token',$friend_memory->access_token);
					}
					break;
				}
				case 6: //memory friend approved by owner
				{
					if(isset($friend_memory))
					{
						$notify['text']="<b> ".$friend_memory->name." </b> memory approved by admin";
						$notify['url']=$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);
					}
					break;
				}
				case 8: //memory friend approved by owner
				{
					if(isset($friend_memory))
					{
						$notify['text']="<b> ".$friend_memory->name." </b> memory rejected by admin";
						$notify['url']=$this->replaceURLPrams(config('frontendRoutes.review-friend-memory'),'access_token',$friend_memory->access_token);
					}
					break;
				}
				case 9: //memory resubmitted
				{
					$notify['text']="<b> ".$memory->name." </b> has been resubmitted for review";
					$notify['url']=$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',$memory->access_token);
					break;
					break;
				}
				default:
				{

					break;
				}
			}
		}
		return $notify;
	}


	function markRead(Request $request)
	{
		$validator = Validator::make($request->all(), ['id' => 'required|integer']);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		MemoryNotifications::where('id',$request->get('id'))->update(['read'=>1]);
		//reduce count by 1
		/** @var User $media */
		//User::find(Auth::id())->decrement('notification_count');

		$response = [ 'message' => 'Update Success' ];
		return response($response);
	}

	function checkNewUserNotificationExist(Request $request)
	{
		$notification_count = Auth::User()->notification_count;
		$exist=false;
		if($notification_count>0)
		{
			$exist=true;
		}
		$response = [ 'show_notification' => $exist ];
		return response($response);
	}

	function markUserNotificationAllRead(Request $request)
	{

		/** @var User $media */
		User::find(Auth::ID())->update(['notification_count'=>0]);

		$response = [ 'message' => 'Update Success' ];
		return response(Auth::ID());
	}
	function markMemoryNotificationAllRead(Request $request)
	{
		$validator = Validator::make($request->all(),
			['access_token' => 'required',new IsMD5()]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		$memory=Memory::where(['access_token'=>$request->get('access_token')])->firstOrFail();

		MemoryNotifications::where(['memory_id'=>$memory->id])->update(['read'=>1]);

		$response = [ 'message' => 'Update Success' ];
		return response($response);
	}


}
