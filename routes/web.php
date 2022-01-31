<?php

use App\Http\Controllers\ImageController;
use App\Http\Controllers\MailerViewController;
use App\Http\Controllers\MemoryServerMediaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	return redirect(route('login'));
});

//Route::get('image-upload', [ImageController::class, 'index' ])->name('image.index');
Route::get('view-mailer', [MailerViewController::class, 'index' ])->name('view-mailer');
//Route::post('image-upload', [ImageController::class, 'upload' ])->name('image.upload');

Route::get('/send-mail', function () {


	dispatch(new App\Jobs\SendMailJob('SendEmailDemo',array('email'=>'rs.sureshkumar@yahoo.com')));

	dd('send mail successfully !!');

});
Route::get('/mail', function () {
	foreach (new DirectoryIterator('../app/Mail') as $fileInfo)
	{
		if($fileInfo->isDot()) continue;


			$files[]= $fileInfo->getFilename();
	}
	foreach($files as $file)
	{
		echo "<a href='/mail?file=".$file."'>".$file."</a><br>";
	}

	if(isset($_GET['file']))
	{
		$details['name']="test name";
		$details['logged_user_email']="test logged user email";
		$details['loving']="test loving";
		$details['url']="https://affsp-backend.ogilvylab.co.za";
		$details['email']="test-email@aa.com";
		$details['date']="test-date";
		$details['date_meaning']="test-date meaning";
		$details['edit_link']="https://affsp-backend.ogilvylab.co.za";
		$details['reject_reason']="asd asdasd asd asd lakshd hq38746 8kasbj kashfd iwqueytr 873akfsbaskldfhg wqo837 56dvkhskdfhbksjeqhf o8w273 fgdjf ";
		$details['friend_email']="test-friend-email@aa.com";
		$details['access_token']="aswdsd12312asdbajshdy734vsj";
		$details['cover_image']="https://affsp-backend.ogilvylab.co.za/memories/images/74f2685956d9291d81c589b495c33586/favourites/1638122211.jpeg";
		$mail_path="App\Mail\\".str_replace(".php","",$_GET['file']);
		return new $mail_path($details);
	}

});


Auth::routes(['register' => false]);

Route::get('/unsubscribe', [App\Http\Controllers\UnsubscribeController::class, 'index'])->name('unsubscribe');

//all admin routes logged in
Route::middleware('auth:web')->group(function () {
	Route::get('/logout', [\App\Http\Controllers\LogoutController::class,'perform'])->name('logout.perform');

	Route::group(['prefix'=>'admin','as'=>'admin.'], function() {
		Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
		Route::get('/memories', [App\Http\Controllers\Admin\ManageMemoryController::class, 'index'])->name('memories');
		Route::get('/memory/view/{memory:id}', [App\Http\Controllers\Admin\ManageMemoryController::class, 'single'])->name('memory');
		Route::post('/memory/approve', [App\Http\Controllers\Admin\ManageMemoryController::class, 'approve'])->name('memory-approve');
		Route::post('/memory/reject', [App\Http\Controllers\Admin\ManageMemoryController::class, 'reject'])->name('memory-reject');
		Route::post('/memory/preview', [App\Http\Controllers\Admin\ManageMemoryController::class, 'preview'])->name('memory-preview');
		//friend memory admin approve
		Route::post('/friend/memory/approve', [App\Http\Controllers\Admin\ManageMemoryController::class, 'friendMemoryApprove'])->name('friendMemoryApprove');
		Route::get('/resources', App\Http\Livewire\HelpfulResources::class)->name('resources');

		Route::get('/users', App\Http\Livewire\UsersTable::class)->name('users');



	});

	Route::get('/docs', function () {
		return view("scribe.index");
	});
});





//Route::get('memory/image/{filename}', [MemoryServerMediaController::class,'index'])->name('memory.media.serve');
