<?php

namespace App\Exceptions;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

	/**
	 * Convert an authentication exception into a response.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Illuminate\Auth\AuthenticationException  $exception
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	protected function unauthenticated($request, AuthenticationException $exception)
	{
		$is_api_request = in_array('api',$request->route()->getAction('middleware'));

		if ($request->expectsJson() || $is_api_request) {
			return response(['error' => 'Unauthenticated.'], 401);
		}

		return redirect(route('login'));
	}




	function render( $request, Throwable $e )
	{
		dump($e->getMessage());
		if( $request->is('api/*')){
			if(config('app.debug')==true)
			{
				$error=$e->getMessage();
			}
			else
			{
				$error=$e->getMessage();
			}
			if ($e instanceof ModelNotFoundException) {
				$model = strtolower(class_basename($e->getModel()));
				return response()->json([
					'error' => $error ? $error :'Model Data not found'
				], 404);
			}
			else if ($e instanceof NotFoundHttpException) {
				return response()->json([
					'error' => $error ? $error :'Resource not found'
				], 404);
			}
			else if ($e instanceof PostTooLargeException) {
				return response()->json([
					'error' => $error ? $error :'File too large'
				], 422);

			}
			else if ($e instanceof AuthenticationException) {
				return response()->json([
					'error' => $error
				], 404);
			}
			if ($e instanceof ValidationException && $request->wantsJson()) {
				return response()->json([
					'message' => ($e->getMessage()),
					'errors' => $e->validator->getMessageBag()], 422);
			}

			else
			{
				if(config('app.debug')==true)
				{
					return response()->json([
						'error' => $e->getMessage()."File : ".$e->getFile()."<br>Line : ".$e->getLine()
					], 404);
				}
				else
				{
					return response()->json([
						'error' => 'Server Error'
					], 404);
				}

			}
		}
		else
		{
			return parent::render($request, $e);
		}
	}


}
