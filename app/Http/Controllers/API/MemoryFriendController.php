<?php

namespace App\Http\Controllers\API;


use App\Mail\AdminNotifyApproveFriendMemoryMail;
use App\Mail\FriendMemoryRequestMail;
use App\Mail\FriendMemorySubmittedMail;
use App\Mail\MemorySharedMail;
use App\Models\Memory;
use App\Models\MemoryFavorites;
use App\Models\MemoryFriends;
use App\Models\MemorySpecialDates;
use App\Models\MemoryVisibility;
use App\Models\User;
use App\Rules\IsMD5;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Validator;
use Storage;
/**
 * @group Memory Friends management
 *
 * APIs for Memory Friends
 */
class MemoryFriendController extends APIBaseController
{

	//this function is part of intial request to invirte friends
	function inviteFriends(Request $request)
	{
		$validator = Validator::make($request->all(), [
			"friends"  => "required|array|distinct|min:1",
			"friends.*"  => "required|array|distinct|min:1",
			"friends.*.email"  => "required|email",
		]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		$data=$request->get('friends');
		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		/** @var \App\Models\User $logged_user */
		$logged_user=Auth::User();
		$logged_user_email=$logged_user->email;


		$all_emails_posted=array();
		if($data)
		{
			foreach((array)$data as $key=>$d)
			{
				/*$memory_includes = MemoryFriends::where(['memory_id'=>$request->get('memory_id'),'email'=>$d['email']])->first();

				if (!is_null($memory_includes)) {
					$memory_includes->update([
						'verified' => 0,
					]);
				}else{
					MemoryFriends::create([
						'email' =>$d['email'],
						'verified' => 0,
						'access_token' =>$this->generateAccessToken(),
						'memory_id'=>$request->get('memory_id')
					]);
				}*/

				$all_emails_posted[]=$d['email'];
				$friend_exist=MemoryFriends::where(['email' =>$d['email'],'memory_id'=>$memory->id])->first();
				if(!$friend_exist) {
					$access_token=$this->generateAccessToken();
					MemoryFriends::create( [
						'email'        => $d['email'],
						'verified'     => 0,
						'access_token' => $access_token,
						'memory_id'    => $memory->id
					] );

					//send mail
					$memory_detail['name']=$memory->name;
					$memory_detail['cover_image']=$this->circleImage($memory->getAttributes()['thumbnail']);;
					$memory_detail['loving']=$memory->loving;
					$memory_detail['email']=$d['email'];
					$memory_detail['logged_user_email']=$logged_user_email;
					$memory_detail['friend_email']=$d['email'];
					$memory_detail['access_token']=$access_token;
					$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.invite-friend-memory'),'access_token',$access_token);
					//\Mail::to($d['email'])->send(new FriendMemoryRequestMail($memory_detail));
					dispatch(new \App\Jobs\SendMailJob('FriendMemoryRequestMail',$memory_detail));
				}
			}

			//delete friends if they removed
			$all_friends=MemoryFriends::where('memory_id',$memory->id)->get();
			if($all_friends)
			{
				foreach($all_friends as $all_friend)
				{
					if(!in_array($all_friend->email,$all_emails_posted))
					{
						MemoryFriends::where('id',$all_friend->id)->delete();
					}
				}
			}
		}
		else //delete all
		{
			MemoryFriends::where('memory_id',$memory->id)->delete();
		}




		$response = [ 'message' => 'Friends invited Successfully' ];
		return response($response);

	}

	function getMemoryInfoByFriendToken(Request $request)
	{
		$validator = Validator::make($request->all(), [
			"access_token"  => "required|string",
		]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		if($this->isValidMd5($request->get('access_token')))
		{
			$friend_memory=MemoryFriends::where('access_token', $request->get('access_token'))->firstOrFail();
			$memory=Memory::where('id', $friend_memory->memory_id)->firstOrFail();

			$return_data['name']=$memory->name;
			$return_data['cover_image']=$memory->cover_image;
			$return_data['thumbnail']=$memory->thumbnail;
			$return_data['thumbnail']=$memory->thumbnail;

			$response = [ 'memory' => $memory ];
			return response($response);
		}
		else
		{
			return response(['error'=>'Invalid Hash'], 422);
		}
	}

	function deleteFriendMemory(Request $request)
	{
		$validator = Validator::make($request->all(), [
			"access_token"  => "required|string",
			"memory_access_token"  => "required|string",
		]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		if($this->isValidMd5($request->get('access_token')))
		{
			$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
			MemoryFriends::where(['memory_id'=>$memory->id,'access_token'=>$request->get('access_token')])->delete();
			$response = [ 'message' => 'Removed Successfully' ];
			return response($response);
		}
		else
		{
			return response(['error'=>'Invalid Hash'], 422);
		}
	}

	function submitFriendMemory(Request $request)
	{
		$validator = Validator::make($request->all(),
			['relationship' => 'required|string|max:255',
			 'description' => 'required|string',
			 'image' => 'required|string',
			 'access_token'=>['required',new IsMD5()]
			]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		$memory_friend=MemoryFriends::where(['access_token'=>$request->get('access_token'),'verified'=>0])->firstOrFail();
		$memory=Memory::findOrFail($memory_friend->memory_id);

		$memory_friend->description=$request->get('description');
		$memory_friend->relationship=$request->get('relationship');

		$memory_friend->verified=0;
		//create folder if not exists
		$folder   = "memories/images/" . $memory->access_token . "/friends/";
		$folder=$this->createDir($folder);
		$file="";
		if($request->has('image'))
		{

			$file=$folder.uniqid() . '.jpeg';
			$avatar = Image::make($request->get('image'))->stream();
			Storage::put($file, $avatar);

		}
		$memory_friend->image=$file;
		//	$memory_friend->image=$this->uploadMedia($request,'image');
		$memory_friend->save();


		//send notification to owner for review this friend memory
		//send mail
		$send_mail_address=User::where('id',$memory->user_id)->value('email');
		$memory_detail['name']=$memory->name;

		$memory_detail['cover_image']=$this->circleImage($memory->getAttributes()['thumbnail']);;
		$memory_detail['loving']=$memory->loving;
		$memory_detail['logged_user_email']=$memory_friend->email;
		$memory_detail['access_token']=$memory_friend->access_token;
		$memory_detail['email']=$send_mail_address;

		//\Mail::to($send_mail_address)->send(new FriendMemorySubmittedMail($memory_detail));
		//	dispatch(new \App\Jobs\SendMailJob('FriendMemorySubmittedMail',$memory_detail));

		$memory_detail['email']=$memory_friend->email;
		dispatch(new \App\Jobs\SendMailJob('FriendMemorySubmittedContributedMail',$memory_detail));

		$user_id=0;
		if (!Auth::guest())
			$user_id=Auth::ID();



		//memory friend submitted
		$this->createMemoryNotification(['memory_id'=>$memory->id,'user_to_notify'=>$memory->user_id,'type_id'=>4,
		                                 'user_who_fired_event'=>$user_id,'friend_memory_id'=>$memory_friend->id],$memory->user_id);
		$response = ['message'=>'Memory Submitted','data'=>$this->memoryFetchQuickData($memory)];
		return response($response);
	}


	function reviewFriendMemory(Request $request)
	{
		$validator = Validator::make($request->all(),
			[ 'access_token'=>['required',new IsMD5()] ]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		$memory_friend=MemoryFriends::where(['access_token'=>$request->get('access_token')])->firstOrFail();
		$memory=Memory::findOrFail($memory_friend->memory_id);

		$memory_info=$this->memoryFetchQuickData($memory);

		$approved_by_admin=0;
		if($memory_friend->verified==2)
		{
			$approved_by_admin=1;
		}
		$memory_detail['submitted_by']=$memory_friend->email;
		$memory_detail['relationship']=$memory_friend->relationship;
		$memory_detail['access_token']=$memory_friend->access_token;
		$memory_detail['memory_access_token']=$memory->access_token;
		$memory_detail['description']=$memory_friend->description;
		$memory_detail['image']=$memory_friend->image;
		$memory_detail['approved_by_admin']=$approved_by_admin;
		$memory_detail=array_merge($memory_info,$memory_detail);

		$response = ['message'=>'success','data'=>$memory_detail];

		return response($response);
	}


	function approveFriendMemory(Request $request)
	{
		$validator = Validator::make($request->all(),
			[ 'access_token'=>['required',new IsMD5()] ]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		$memory_friend=MemoryFriends::where(['access_token'=>$request->get('access_token'),'verified'=>0])->firstOrFail();
		$memory_friend->verified=1;
		$memory_friend->save();

		$memory=Memory::findOrFail($memory_friend->memory_id);
		$user_id=0;
		if (!Auth::guest())
			$user_id=Auth::ID();

		//memory friend submitted
		$this->createMemoryNotification(['memory_id'=>$memory->id,'user_to_notify'=>$memory->user_id,'type_id'=>5,
		                                 'user_who_fired_event'=>$user_id,'friend_memory_id'=>$memory_friend->id]);

		//send email to admin to review this
		$send_mail_address=config('app.ADMIN_EMAIL');
		$memory_detail['name']=$memory->name;
		$memory_detail['logged_user_email']=$memory_friend->email;
		$memory_detail['access_token']=$memory->access_token;

		//\Mail::to($send_mail_address)->send(new AdminNotifyApproveFriendMemoryMail($memory_detail));
		//	dispatch(new \App\Jobs\SendMailJob('AdminNotifyApproveFriendMemoryMail',$memory_detail));
		$response = ['message'=>'Memory Submitted waiting for Admin approve'];
		return response($response);
	}

}
