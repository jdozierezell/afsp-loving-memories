<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Controllers\Controller;
use App\Models\Memory;
use Illuminate\Http\Request;

class DashboardController extends APIBaseController
{


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{

		$memories = Memory::all();
		$total = $memories->count();
		$draft = $memories->where('status_id', '1')->count();
		$submitted = $memories->where('status_id', '2')->count();
		$approved = $memories->where('status_id', '3')->count();
		$rejected = $memories->where('status_id', '4')->count();

		return view('admin/dashboard',compact('total','draft','submitted','approved','rejected'));
	}
}
