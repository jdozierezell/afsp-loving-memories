<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class ImageController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\View
	 */
	public function index()
	{
		return view('welcome');
	}

	/**
	 * handle upload file
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function upload(Request $request)
	{
		$request->validate([
			'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
		]);

		$image_name = time().'.'.$request->image->extension();

		$path = Storage::disk('s3')->put('images', $request->image);
		dump($path);
		//$path = Storage::disk('s3')->url($path);
	//	dd($path);
		$url = Storage::temporaryUrl(
			$path,
			now()->addMinutes(5),
			['ResponseContentType' => 'application/octet-stream']
		);
		echo "<img src='".$url."'>";
die();
		// here you need to store image path in database

		return redirect()->back()
		                 ->with('success', 'Image uploaded successfully.')
		                 ->with('image', $path);
	}
}
