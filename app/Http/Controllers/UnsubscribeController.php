<?php

namespace App\Http\Controllers;

use App\Models\Unsubscribed;
use Illuminate\Http\Request;

class UnsubscribeController extends Controller
{
	/**
	 * Show the application dashboard.
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function index(Request $request)
	{
		if($request->get('email') && $request->get('hash'))
		{
			$hash=md5($request->get('email').config('UNSUBSCRIBE_SECRET'));
			if( $request->get('hash') ==$hash )
			{
				Unsubscribed::updateorCreate(['email'=>$request->get('email')],['email'=>$request->get('email')]);
			}
		}
		return redirect(config('APP_FRONT_URL').'?unsubscribed=1');
	}
}
