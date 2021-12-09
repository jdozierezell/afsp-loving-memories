<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Response;

class MemoryServerMediaController extends Controller
{
	//
	public function index ($file)
	{
		dump(asset('storage/memory/image/1/1629986499.jpg') );

		$path = storage_path('app/' . $file);
		if (!File::exists($path)) {
			abort(404);
		}

		$file = File::get($path);
		$type = File::mimeType($path);
		$response = Response::make($file, 200);
		$response->header("Content-Type", $type);
		return $response;
	}

}
