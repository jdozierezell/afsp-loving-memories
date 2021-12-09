<?php

namespace App\Http\Middleware;

use App\Models\Memory;
use Closure;
use Illuminate\Http\Request;

class VerifyMemoryBelongtoUser
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{


		if ($request->get('memory_access_token'))
		{
			//get user id
			$user_id=\Auth::id();
			$memory=Memory::firstOrFail()->where(['user_id'=>$user_id,'access_token', $request->get('memory_access_token')]);
			return $next($request);
		}
		else if ($request->get('memory_id'))
		{
			//get user id
			$user_id=\Auth::id();

			Memory::findOrFail(['user_id'=>$user_id,'memory_id'=>$request->get('memory_id')]);
			return $next($request);
		}
		else
			abort(403, 'You do not access to this item.');
	}
}
