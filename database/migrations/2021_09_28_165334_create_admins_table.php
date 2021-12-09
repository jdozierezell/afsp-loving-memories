<?php

use App\Models\Admin;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('admins', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->boolean('is_super')->default(0);
			$table->rememberToken();
			$table->timestamps();
		});

		Admin::insert(['name'=>'suresh-ogilvy','email'=>'suresh.kumar@ogilvy.co.za','password'=>Hash::make('P@55w0rdAFSP'),'is_super'=>1]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('admins');
	}
}
