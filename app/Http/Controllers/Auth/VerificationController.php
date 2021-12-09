<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Arr;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\Request;
use URL;
use Validator;

class VerificationController extends APIBaseController
{
	/*
	|--------------------------------------------------------------------------
	| Email Verification Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling email verification for any
	| user that recently registered with the application. Emails may also
	| be re-sent if the user didn't receive the original email message.
	|
	*/

	use VerifiesEmails;

	var $keyResolver;

	/**
	 * Where to redirect users after verification.
	 *
	 * @var string
	 */
	protected $redirectTo = RouteServiceProvider::HOME;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth:api');
		//$this->middleware('signed')->only('verify');
		$this->middleware('throttle:6,1')->only('verify', 'resend');

	}

	public function verify(Request $request) {

		$validator = Validator::make($request->all(), ['expires' => 'required|integer','hash'=>'required|string',
					'signature'=>'required|string','id'=>'required|integer']);
		if ($validator->fails())
		{
			return $this->validatorFailResponse($validator);
		}


		if (!$request->hasValidSignature()) {
			return response()->json(["msg" => "Invalid/Expired url provided."], 401);
		}
		$user = User::findOrFail($request->id);

		if (!$user->hasVerifiedEmail()) {
			$user->markEmailAsVerified();
		}

		$response = ['message'=>'Verified successfully'];
		return response($response);
	}

	public function resend() {

		if (auth()->user()->hasVerifiedEmail()) {
			return response(["msg" => "Email already verified"], 400);
		}

		auth()->user()->sendEmailVerificationNotification();
		return response(["msg" => "Email verification link sent on your email id"], 200);
	}


}
