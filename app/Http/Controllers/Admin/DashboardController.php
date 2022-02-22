<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Controllers\Controller;
use App\Mail\SendEmailDemo;
use App\Models\Memory;
use App\Models\MemoryPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Intervention\Image\Facades\Image;
use Storage;

class DashboardController extends APIBaseController
{


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		/*$memory=Memory::where('access_token','2f4a41bb2e750169f6f9ff2e6922d9cd')->firstOrFail();
		$thumbnail_path=$memory->getAttributes()['thumbnail'];
		$cover_with_icon=str_replace("_thumbnail","_cover_with_submitted_icon",$thumbnail_path);
		$return_path=$cover_with_icon;

		$this->circleImageWithIcon($thumbnail_path,public_path('images/icon-memory-submitted.png'),$return_path);
		$img_path=Storage::temporaryUrl(
			$return_path,
			now()->addWeek(1),
			['ResponseContentType' => 'application /octet-stream']
		);;
		return Image::make($img_path)->response();
dd($return_path);*/
		$memories = Memory::withoutGlobalScopes()->get();
		$total = $memories->count();
		$draft = $memories->where('status_id', '1')->count();
		$submitted = $memories->where('status_id', '2')->count();
		$approved = $memories->where('status_id', '3')->count();
		$rejected = $memories->where('status_id', '4')->count();

		return view('admin/dashboard',compact('total','draft','submitted','approved','rejected'));
	}


}
