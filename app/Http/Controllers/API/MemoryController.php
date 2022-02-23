<?php

namespace App\Http\Controllers\API;



use App\Models\Memory;
use App\Models\MemoryAdminPreview;
use App\Models\MemoryFavorites;
use App\Models\MemoryFriends;
use App\Models\MemoryNotifications;
use App\Models\MemorySpecialDates;
use App\Models\MemoryVisibility;
use App\Rules\IsMD5;
use Auth;
use Illuminate\Http\Request;
use Validator;
use DB;
/**
 * @group Memory fetch management
 *
 * APIs for Memory fetch
 */
class MemoryController extends APIBaseController
{
	function  latest(Request $request)
	{
		list($offset,$limit)=$this->getPaginationFromRequest($request);

		$memories=Memory::where(['status_id'=>3,'visible_type'=>'public'])->select('name','thumbnail','access_token')->orderBy(DB::raw('RAND()'))->offset($offset)->limit(50)->get();
		$response = ['memories' => $memories];
		return response($response);
	}

	function getSingleMemoryInfo(Request $request)
	{

		$validator = Validator::make($request->all(),
			['access_token' => 'required_without:private_access_token',new IsMD5(),
			 'private_access_token' => 'required_without:access_token',new IsMD5() ]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}

		$memory=null;
		//get data using memory token
		if($request->has('access_token'))
		{
			$memory=Memory::where(['access_token'=>$request->get('access_token')])->firstOrFail();
		}
		else if($request->has('private_access_token'))
		{
			$memory_visible=MemoryVisibility::with('memory')->where(['access_token'=>$request->get('private_access_token')])->firstOrFail();
			$memory=$memory_visible->memory;
		}
		if($memory)
		{
			if(Auth::Id()==$memory->id)
			{
				$memory_info=$this->getMemoryFullInfo($memory->id);
				$response = ['memory' => $memory_info,'message'=>'success'];
			}
			else
			{
				if($memory->status_id==1)
				{
					$response = ['message' => 'Draft'];
				}
				else if($memory->status_id==4)
				{

					$response = ['message' => 'rejected'];
				}
				else if($memory->status_id==2)
				{
					//if user logged check memory belong to use
					if(Auth::Id()==$memory->id)
					{
						$memory_info=$this->getMemoryFullInfo($memory->id);
						$response = ['memory' => $memory_info,'message'=>'success'];
					}
					else{
						$response = ['message' => 'Pending'];
					}

				}
				else if($memory->status_id==3)
				{
					$memory_info=$this->getMemoryFullInfo($memory->id);
					$response = ['memory' => $memory_info,'message'=>'success'];
				}
				else
					$response = ['message' => 'Draft'];
			}



			return response($response);
		}
		$response = ['status' => 'invalid request'];
		return response($response);
	}

	function getMemoryFullInfo($memory_id)
	{
		return Memory::with(['photos','favorites','specialDates','verifiedFriends'])->where('id',$memory_id)->get();
	}

	function getMemoryPreviewInfo($memory_id)
	{
		return Memory::with(['photos','favorites','specialDates','friends','user','verifiedFriends'])
		             ->withCount('pendingMemories')
		             ->where('id',$memory_id)->get();
	}

	function adminPreview(Request $request)
	{
		$validator = Validator::make($request->all(),
			['access_token' => 'required',new IsMD5()]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		$memory_admin_preview=MemoryAdminPreview::where(['access_token'=>$request->get('access_token')])->firstOrFail();


		if(strtotime($memory_admin_preview->expire_at) > strtotime("-30 minutes")) {
			$memory_info=$this->getMemoryPreviewInfo($memory_admin_preview->memory_id);
			$response = ['memory' => $memory_info,'message'=>'success'];
		}
		else
		{
			$response=['error'=>'Invalid Request'];
		}

		return response($response);
	}
	function preview(Request $request)
	{
		$validator = Validator::make($request->all(),
			['access_token' => 'required',new IsMD5()]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		$memory=Memory::where(['access_token'=>$request->get('access_token'),'user_id'=>Auth::Id()])->firstOrFail();

		$memory_info=$this->getMemoryPreviewInfo($memory->id);
		$response = ['memory' => $memory_info,'message'=>'success'];
		return response($response);
	}

	function search(Request $request)
	{
		$validator = Validator::make($request->all(),
			['s' => 'required|string']);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		list($offset,$limit)=$this->getPaginationFromRequest($request);
		$search=$request->get('s');
		$memories=Memory::select(['name','thumbnail','access_token'])
		                ->where('status_id',3)
		                ->where('visible_type','public')
		                ->where(function($q) use ($search) { // $term is the search term on the query string
			                if($search)
			                {
				                $q->where('name', 'LIKE', '%' . $search . '%')
				                  ->orWhere('description', 'LIKE', '%' . $search . '%');
			                }
		                })
		                ->orderBy('name','asc')
		                ->offset($offset)->limit($limit)->get();
		$response = ['memories' => $memories];
		return response($response);
	}

	function userMemories(Request $request)
	{

		$user_id=Auth::Id();

		list($offset,$limit)=$this->getPaginationFromRequest($request);

		$memories=Memory::where(['user_id'=>$user_id])->select('name','thumbnail','access_token','status_id','visible_type')->withCount('UnreadNotifications')->orderBy('id','desc')->offset($offset)->limit($limit)->get();
		$response = ['memories' => $memories];
		return response($response);
	}


	function delete(Request $request)
	{
		$validator = Validator::make($request->all(),
			['access_token' => 'required',new IsMD5()]);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		$memory=Memory::where(['access_token'=>$request->get('access_token'),'user_id'=>Auth::Id()])->firstOrFail();
		$memory->active=0;
		$memory->save();


		$memory_detail['name']=$memory->name;
		$memory_detail['cover_image']=$this->circleImage($memory->getAttributes()['thumbnail']);
		$memory_detail['loving']=$memory->loving;
		$memory_detail['email']=Auth::User()->email;
		$memory_detail['url']=config('app.APP_FRONT_URL').config('frontendRoutes.start-memory');

		dispatch(new \App\Jobs\SendMailJob('MemoryDeletedMail',$memory_detail));


		$response = ['message'=>'success'];
		return response($response);
	}
}
