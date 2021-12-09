<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryFriends extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memory_friends', function (Blueprint $table) {
			$table->id();
			$table->string('email');
			$table->text('description')->nullable();
			$table->boolean('verified')->default(0)->comment('0-not verified , 1 -verified by owner 2 - verified by admin	');
			$table->string('access_token', 64)->unique();
			$table->string('relationship')->nullable();
			$table->string('image')->nullable();
			$table->biginteger('memory_id')->unsigned();
			$table->foreign('memory_id')->references('id')->on('memories')->onDelete('cascade');
			$table->timestamps();

			$table->index('email');
			$table->index('verified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('memory_friends');
	}
}
