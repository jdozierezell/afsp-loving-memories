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
	$var="https://loving-memories.s3.amazonaws.com/memories/images/4fbb737f6242e7fbf98ceeb59a5b7de1/1639479673.jpg?response-content-type=application%20%2Foctet-stream&X-Amz-Content-Sha256=UNSIGNED-PAYLOAD&X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIATZVESLQYIOE7S6OU%2F20211214%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20211214T120502Z&X-Amz-SignedHeaders=host&X-Amz-Expires=600&X-Amz-Signature=0b4b7fe9b0aa2b0b95e333fdebdd79b306ce76fa1434d875440221695bdd203e";

		dd($path_info);
		$memories=Memory::with(['photos','favorites','specialDates','verifiedFriends'])->where('id',1)->get();
		dd($memories);
		$memories = Memory::all();
		$total = $memories->count();
		$draft = $memories->where('status_id', '1')->count();
		$submitted = $memories->where('status_id', '2')->count();
		$approved = $memories->where('status_id', '3')->count();
		$rejected = $memories->where('status_id', '4')->count();

		return view('admin/dashboard',compact('total','draft','submitted','approved','rejected'));
	}
}
