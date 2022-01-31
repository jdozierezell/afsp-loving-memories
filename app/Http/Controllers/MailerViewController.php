<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class MailerViewController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function index(Request $request)
	{
		$file=$request->get('file');
		$file_html=$file.".html";
		if(file_exists($file_html))
		{
			return redirect(url($file_html));
		}
		else
		{

			return redirect(config('app.APP_FRONT_URL'));

		}

	}


}
