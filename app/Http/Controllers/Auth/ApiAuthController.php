<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Str;


class ApiAuthController extends APIBaseController
{
	//

	public function register (Request $request) {
		$validator = Validator::make($request->all(), [
			'email' => 'required|string|email|max:255|unique:users,email',
			'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
		],['password.regex'=>'Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.']);

		if ($validator->fails())
		{
			return response(['error'=>$validator->errors()->all()], 422);
		}
		$request['name']=$this->getNameFromEmail($request->get('email'));
		$request['password']=Hash::make($request['password']);
		$request['remember_token'] = Str::random(10);
		$user = User::create($request->toArray());
		$token = $user->createToken(config('app.PASSPORT_TOKEN_NAME'))->accessToken;
		if (!$user->hasVerifiedEmail()) {
			$user->sendEmailVerificationNotification();
		}
		$response = ['token' => $token,'verified'=>false];
		return response($response, 200);
	}

	public function login (Request $request) {
		$validator = Validator::make($request->all(), [
			'email' => 'required|string|email|max:255',
			'password' => 'required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/',
		],['password.regex'=>'Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.']);
		if ($validator->fails())
		{
			return response(['error'=>$validator->errors()->all()], 422);
		}
		$user = User::where('email', $request->email)->first();
		if ($user) {
			if (Hash::check($request->password, $user->password)) {
				$token = $user->createToken(config('app.PASSPORT_TOKEN_NAME'))->accessToken;
				$user_verified=false;
				if($user->email_verified_at)
					$user_verified=true;
				$response = ['token' => $token,'verified'=>$user_verified];
				return response($response, 200);
			} else {
				$response = ["message" => "Specified account not exist"];
				return response($response, 422);
			}
		}
		else {
			//if not exist create user
			return $this->register($request);
			//$response = ["message" =>'User does not exist'];
			//return response($response, 422);
		}
	}

	public function logout (Request $request) {
		$token = $request->user()->token();
		$token->revoke();
		$response = ['message' => 'You have been successfully logged out!'];
		return response($response, 200);
	}


	function socialLogin(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'provider' => 'required|string|max:255',
			'access_token' => 'required|string',
		]);
		if ($validator->fails())
		{
			return response(['error'=>$validator->errors()], 422);
		}

		$provider = $request->input('provider');; // or $request->input('provider_name') for multiple providers
		$token = $request->input('access_token');


		try
		{
			switch($provider)
			{
				case "facebook" || "google":
				{
					$providerUser = Socialite::driver($provider)->userFromToken($token);
					break;
				}
				default:
				{
					$response = ['error' => 'Invalid Social Provider'];
					return response($response, 422);
				}
			}

			if($providerUser) //user validated
			{

				$user = User::where('provider', $provider)->where('provider_id', $providerUser->id)->first();
				$provider_email=$providerUser->email;
				if(!$provider_email)
				{
					$provider_email=$providerUser->id."@".$provider;
				}



				// if there is no record with these data, create a new user
				if($user == null)
				{
					//check this email already exist in user table to avoid duplicate
					$user = User::where('email', $provider_email)->first();
					if($user == null)
					{
						$user = User::create([
							'name'=>$providerUser->name,
							'email'=>$provider_email,
							'password'=>Hash::make(Str::random(10)),
							'email_verified_at'=>date("Y-m-d H:i:s"),
							'provider' => $provider,
							'provider_id' => $providerUser->id,
						]);
					}
				}

				$token = $user->createToken(config('app.PASSPORT_TOKEN_NAME'))->accessToken;
				$response = ['token' => $token];
				return response($response, 200);
			}
		}
		catch(\Exception $exception)
		{
			$response = ['error' => $exception->getMessage()];
			return response($response, 422);
		}
	}

	public function update (Request $request) {
		$validator = Validator::make($request->all(),
			[
			'email' => 'required|email|unique:users,email,'.\Auth::ID(),
			'password' => $request->password != null ?'sometimes|required|string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/': ''
		],['password.regex'=>'Your password must be more than 8 characters long, should contain at-least 1 Uppercase, 1 Lowercase, 1 Numeric and 1 special character.']);
		if ($validator->fails())
		{
			return response(['error'=>$validator->errors()->all()], 422);
		}
		$v_data=$validator->validated();
		$user = \Auth::User();
		if ($user) {
			$user->email=$v_data['email'];
			//$user->name=$v_data['name'];
			if(isset($v_data['password']))
				$user->password=Hash::make($v_data['password']);
			$user->save();
			//send mail

			$memory_detail['email']=$v_data['email'];
			$memory_detail['name']=$v_data['name'];
			$memory_detail['url']=config('app.APP_FRONT_URL').config('frontendRoutes.reset-password');
			dispatch(new \App\Jobs\SendMailJob('PasswordUpdatedMail',$memory_detail));

			$response = ['message' => 'User Updated'];
			return response($response, 200);
		}
		else {
			$response = ["message" => "Specified account not exist"];
			return response($response, 422);
		}
	}


}
