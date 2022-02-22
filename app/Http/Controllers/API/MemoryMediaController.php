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
use Illuminate\Support\Collection;
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
				$this->assignDraftModeIfChanged($memory,1);//forcing to draft new photos
			}
			else if($field=='image')
			{
				MemoryPhotos::create(['memory_id'=>$memory->id,$field=>$uploaded_file]);
				$this->assignDraftModeIfChanged($memory,1);//assignDraftModeIfChanged
			}

			else
			{
				$response = [ 'message' => 'invalid request' ];
				return response($response,422);
			}



			$response = [ 'message' => $field.' created Successfully','photos'=>$this->getPhotos($memory->id) ];
			return response($response);
		}
	}

	function getMemoryPhotos(Request $request)
	{
		$validator = Validator::make($request->all(),
			['access_token' => 'required|string', ]); //image max 100 mb
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		$memory=Memory::where('access_token',  $request->get( 'access_token' ))->firstOrFail();
		$response = [ 'message' => ' fetched Successfully','photos'=>$this->getPhotos($memory->id) ];
		return response($response);
	}

	function getPhotos($memory_id)
	{
		//merge cover image to photos data
		/*$memory=Memory::where('id', $memory_id)->firstOrFail();
		$cover_image_photos=array();
		/*if($memory->cover_image)
		{
			$cover_image_photos =array(
				[
					'image' => $memory->cover_image,
					'url' => $memory->thumbnail,
				]);

		}
		$photos=MemoryPhotos::where('memory_id',$memory_id)->select('image')->orderBy('id','asc')->get()->toArray();
		if($photos)
		{
			$photos=array_merge($cover_image_photos,$photos);
		}*/
		$photos=MemoryPhotos::where('memory_id',$memory_id)->select('image')->orderBy('cover','desc')->orderBy('id','asc')->get()->toArray();
		return $photos;
	}

	function addCover(Request $request)
	{

		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string',
			 'image'=>'required|url']); //image max 100 mb
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}
		$memory=Memory::where('access_token', $request->get( 'memory_access_token' ))->firstOrFail();

		//generate thumbnail
		$image=$request->get( 'image' );
		$parse_url=parse_url($image);
		$local_image_path= ltrim($parse_url['path'], '/');
		$path_info=pathinfo($local_image_path);
		$thumbnail=$path_info['dirname']."/".$path_info['filename']."_thumbnail.".$path_info['extension'];

		//remove photos from list
		MemoryPhotos::where(['memory_id'=>$memory->id])->update(['cover'=>0]);//reset all 0
		MemoryPhotos::where(['memory_id'=>$memory->id,'image'=>$local_image_path])->update(['cover'=>1]);


		//$imgThumb = Image::make($image)->resize(200, 200)->stream();
		//Storage::put($thumbnail, $imgThumb->__toString() );


		$memory->cover_image =$local_image_path;
		$memory->thumbnail =$thumbnail;
		$memory->visible_type='draft';
		$memory->save();




		$response = [ 'message' => 'created Successfully','photos'=>$this->getPhotos($memory->id) ];
		return response($response);

		/*
					$folder   = "memories/images/" . $request->get( 'memory_access_token' );
					//$this->createDir($folder);
					$thumbnail=$folder.'/'.time().'_thumbnail.'.$image->extension();
					$imgThumb = Image::make($image)->resize(200, 200)->stream();
					Storage::put($thumbnail, $imgThumb->__toString() );
					/*$img = Image::make($image);
					$img->resize(200, 200, function ($constraint) {
						$constraint->aspectRatio();
					});
					Storage::put($thumbnail, $img);

					$memory=Memory::where('access_token', $request->get('memory_access_token'))->firstOrFail();
					$memory->thumbnail =$thumbnail;
					$memory->cover_image =$cover_image;
					$memory->save();*/





	}

	function addImage(Request $request)
	{
		$validator = Validator::make($request->all(),
			['memory_access_token' => 'required|string',
			 'image'=>'mimes:jpeg,jpg,png,gif|required|max:'.$this->getMaxUploadSize()]); //image max 100 mb
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
			 'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm|required|max:'.$this->getMaxUploadSize()]); //image max 100 mb
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
				$memory->thumbnail ="";
				$memory->save();
			}
			else if($field=='image')
			{
				Storage::delete($path);
				MemoryPhotos::where(['memory_id'=>$memory->id,'image'=>$path])->delete();
				//check this last photo then remove cover image from memory table
				$photos_count=MemoryPhotos::where(['memory_id'=>$memory->id])->count();;//reset all 0
				if($photos_count==0)
				{
					$memory->cover_image ="";
					$memory->thumbnail ="";
					$memory->save();
				}
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

			$response = [ 'message' => $field.' removed Successfully','photos'=>$this->getPhotos($memory->id),'photos_count'=>$photos_count ];
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
