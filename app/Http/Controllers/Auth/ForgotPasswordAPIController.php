<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
class ForgotPasswordAPIController extends Controller {
	use SendsPasswordResetEmails;

	/**
	 * Send a reset link to the given user.
	 *
	 * @param \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
	 *
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function sendResetLinkEmail(Request $request)
	{

		$this->validate($request, ['email' => 'required|email']);

		/*// Validate user input
		$validator = Validator::make($request->all(), [
			'email' => ['required', 'email', 'max:255' ],
		]);
		if ($validator->fails()) {
			return response(['error' => $validator->errors()], 422);
		}*/

		$response = $this->broker()->sendResetLink($this->credentials($request));

		return $response == Password::RESET_LINK_SENT
			? $this->sendResetLinkResponse($request, $response)
			: $this->sendResetLinkFailedResponse($request, $response);
	}

	protected function sendResetLinkResponse(Request $request, $response)
	{
		$response = ['message' => "Password reset email sent"];
		return response($response, 200);
	}
	protected function sendResetLinkFailedResponse(Request $request, $response)
	{
		$response = "Email could not be sent to this email address";
		return response($response, 500);
	}

}
