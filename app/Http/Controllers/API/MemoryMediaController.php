<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Memory;
use App\Models\MemoryPhotos;
use App\Models\MemoryVideos;
use Auth;
use File;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Storage;
use Validator;
/**
 * @group Memory Media upload management
 *
 * APIs for Memory Media upload
 */
class MemoryMediaController extends APIBaseController
{

	function addMedia(Request $request,$field,$cover=false)
	{
		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		if($memory)
		{
			$uploaded_file=$this->uploadMedia($request,$field);
			if($cover)
			{
				$memory->cover_image =$uploaded_file;
				$memory->save();
				$this->assignDraftModeIfChanged($memory);
			}
			else if($field=='image')
			{
				MemoryPhotos::create(['memory_id'=>$memory->id,$field=>$uploaded_file]);
				$this->assignDraftModeIfChanged($memory);
			}

			else
			{
				$response = [ 'message' => 'invalid request' ];
				return response($response,422);
			}


			$photos=MemoryPhotos::where('memory_id',$memory->id)->select('image')->get()->toArray();
			$response = [ 'message' => $field.' created Successfully','photos'=>$photos ];
			return response($response);
		}
	}

	function addCover(Request $request)
	{
		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string',
			 'image'=>'mimes:jpeg,jpg,png,gif|required|max:100000']); //image max 100 mb
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		//generate thumbnail


		if($request->hasFile('image'))
		{

			$image = $request->file('image');
			/** @var \Illuminate\Http\UploadedFile $image */
			$folder   = "memories/images/" . $request->get( 'memory_access_token' );
			//$this->createDir($folder);
			$thumbnail=$folder.'/'.time().'_thumbnail.'.$image->extension();
			$imgThumb = Image::make($image)->resize(200, 200)->stream();
			Storage::put($thumbnail, $imgThumb->__toString() );
			/*$img = Image::make($image);
			$img->resize(200, 200, function ($constraint) {
				$constraint->aspectRatio();
			});
			Storage::put($thumbnail, $img);*/

			$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
			$memory->thumbnail =$thumbnail;
			$memory->save();
			return $this->addMedia($request,'image',true);
		}



	}

	function addImage(Request $request)
	{
		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string',
			 'image'=>'mimes:jpeg,jpg,png,gif|required|max:100000']); //image max 100 mb
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		return $this->addMedia($request,'image',false);
	}

	function addVideo(Request $request)
	{
		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string',
			 'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm|required|max:1000000']); //image max 100 mb
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		return $this->addMedia($request,'video',false);
	}



	function deleteCover(Request $request)
	{
		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string','image'=>'required|string']); //image max 100 mb
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		return $this->deleteMedia($request,'image',true);
	}

	function deleteImage(Request $request)
	{
		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string','image'=>'required|string']); //image max 100 mb
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		return $this->deleteMedia($request,'image',false);
	}

	function deleteVideo(Request $request)
	{
		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string','video'=>'required|string']); //image max 100 mb
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		return $this->deleteMedia($request,'video',false);
	}

	function deleteMedia(Request $request,$field,$cover)
	{
		$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
		if($memory)
		{

			//remove base url from path
			$path=$this->getImagePath($request->get($field));
			if($cover)
			{
				Storage::delete($path);
				//$memory=Memory::findOrFail($request->get('memory_id'))->where('cover_image',$path);
				$memory->cover_image ="";
				$memory->save();
			}
			else if($field=='image')
			{
				Storage::delete($path);
				MemoryPhotos::where(['memory_id'=>$memory->id,'image'=>$path])->delete();
			}
			else if($field=='video')
			{
				MemoryVideos::where(['memory_id'=>$memory->id,'video'=>$path])->delete();
			}
			else
			{
				$response = [ 'message' => 'invalid request' ];
				return response($response,422);
			}
			$photos=MemoryPhotos::where('memory_id',$memory->id)->select('image')->get()->toArray();
			$response = [ 'message' => $field.' removed Successfully','photos'=>$photos ];
			return response($response);
		}
	}

	function getImagePath($val)
	{
		$fileinfo = parse_url($val);
		$path=$fileinfo['path'];
		$path_info=pathinfo($path);
		$dir = ltrim($path_info['dirname'], '/');
		return $dir."/".$path_info['basename'];
	}
}
