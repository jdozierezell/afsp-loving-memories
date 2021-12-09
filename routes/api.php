<?php

use App\Http\Controllers\API\HelpfulResourceController;
use App\Http\Controllers\API\MemoryCreateController;
use App\Http\Controllers\API\MemoryController;
use App\Http\Controllers\API\MemoryFriendController;
use App\Http\Controllers\API\MemoryMediaController;
use App\Http\Controllers\API\MemoryNotificationController;
use App\Http\Controllers\Auth\ApiAuthController;
use App\Http\Controllers\Auth\ForgotPasswordAPIController;
use App\Http\Controllers\Auth\ResetPasswordAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['cors', 'json.response']], function () {

	Route::post('/login',[ApiAuthController::class,'login'])->name('login.api');
	Route::post('/register',[ApiAuthController::class,'register'])->name('register.api');
	Route::post('password/reset', [ResetPasswordAPIController::class,'reset']);
	Route::post('password/email', [ForgotPasswordAPIController::class,'sendResetLinkEmail'])->name('password.email');
	Route::post('social/login/facebook', [ApiAuthController::class, 'socialLogin']);

	Route::get('email/verify',  [\App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify'); // Make sure to keep this as your route name




	Route::post('helpful-resources', [HelpfulResourceController::class, 'latest']);



	Route::group(['prefix'=>'memory','as'=>'memory.'], function() {
		//latest memories
		Route::post( '/latest', [ MemoryController::class, 'latest' ] )->name( 'latest' );
		//get single memory info
		Route::post( '/info', [ MemoryController::class, 'getSingleMemoryInfo' ] )->name( 'info' );
		//search
		Route::post( '/search', [ MemoryController::class, 'search' ] )->name( 'search' );

		Route::post( '/admin/preview', [ MemoryController::class, 'adminPreview' ] )->name( 'adminPreview' );

		Route::group(['prefix'=>'friend','as'=>'friend.'], function()
		{
			Route::post('/submit', [MemoryFriendController::class,'submitFriendMemory'])->name('submit');
		});


	});


	// our routes to be protected will go in here
	Route::middleware(['auth:api'])->group(function ()
	{
		Route::post('email/resend', [\App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');
		Route::post('/logout', [ApiAuthController::class,'logout'])->name('logout.api');
		Route::group(['prefix'=>'memory','as'=>'memory.'], function()
		{

			Route::post('/preview', [MemoryController::class,'preview'])->name('preview');
			Route::post('/delete', [MemoryController::class,'delete'])->name('delete');



			Route::post('/notifications', [MemoryNotificationController::class,'latest'])->name('notifications.latest');
			Route::post('/notification/read', [MemoryNotificationController::class,'markRead'])->name('notification.read');

			//insert new memory
			Route::post('/add', [MemoryCreateController::class,'add'])->name('add');

			//submit friend memory for owner review
			Route::group(['prefix'=>'friend','as'=>'friend.'], function()
			{
				Route::post('/review', [MemoryFriendController::class,'reviewFriendMemory'])->name('review');
				Route::post('/approve', [MemoryFriendController::class,'approveFriendMemory'])->name('approve');
				Route::post('/delete', [MemoryFriendController::class,'deleteFriendMemory'])->name('delete');
			});

			//add media sub pages
			Route::group(['prefix'=>'add','as'=>'add.','middleware'=>['verify.memory.belongto.user']], function()
			{
				//updating memory desc
				Route::post('/description', [MemoryCreateController::class,'addDescription'])->name('description');
				//memory add media
				Route::post('/cover', [MemoryMediaController::class,'addCover'])->name('cover');
				Route::post('/image', [MemoryMediaController::class,'addImage'])->name('image');
				Route::post('/video', [MemoryMediaController::class,'addVideo'])->name('video');

				Route::post('/favorite-memory', [MemoryCreateController::class,'addFavoriteMemory'])->name('favoriteMemory');
				Route::post('/special-dates', [MemoryCreateController::class,'addSpecialDates'])->name('specialDates');
				Route::post('/invite/friends', [MemoryFriendController::class,'inviteFriends'])->name('inviteFriends');



				Route::post('/theme', [MemoryCreateController::class,'addTheme'])->name('theme');

				Route::post('/visibility', [MemoryCreateController::class,'addVisibility'])->name('visibility');

				Route::post('/submit', [MemoryCreateController::class,'submit'])->name('submit');

			});

			Route::group(['prefix'=>'delete','as'=>'delete.','middleware'=>['verify.memory.belongto.user']], function()
			{
				//memory add media
				Route::post('/cover', [MemoryMediaController::class,'deleteCover'])->name('cover');
				Route::post('/image', [MemoryMediaController::class,'deleteImage'])->name('image');
				Route::post('/video', [MemoryMediaController::class,'deleteVideo'])->name('video');
				//
			});

		});


		Route::group(['prefix'=>'user','as'=>'user.'], function()
		{
			Route::post( '/memories', [ MemoryController::class, 'userMemories' ] )->name( 'userMemories' );
			Route::post( '/update', [ ApiAuthController::class, 'update' ] )->name( 'update' );
		});


	});

});
