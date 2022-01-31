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

		$memory_detail['name']="aaaaa";
		$memory_detail['email']="rs.sureshkumar@yahoo.com";
		$memory_detail['reject_reason']="asdasdasd";
		$memory_detail['cover_image']="";;
		$memory_detail['loving']="ASas";
		$memory_detail['url']=config('app.APP_FRONT_URL').$this->replaceURLPrams(config('frontendRoutes.view-memory'),'access_token',123);;
		dispatch(new \App\Jobs\SendMailJob('MemoryRejectedMail',$memory_detail));

dd(1);

		$memories = Memory::withoutGlobalScopes()->all();
		$total = $memories->count();
		$draft = $memories->where('status_id', '1')->count();
		$submitted = $memories->where('status_id', '2')->count();
		$approved = $memories->where('status_id', '3')->count();
		$rejected = $memories->where('status_id', '4')->count();

		return view('admin/dashboard',compact('total','draft','submitted','approved','rejected'));
	}
}
