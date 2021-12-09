<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryNotificationsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memory_notifications', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->biginteger('memory_id')->unsigned();
			$table->foreign('memory_id')->references('id')->on('memories')->onDelete('cascade');
			$table->biginteger('user_to_notify')->unsigned();
			$table->foreign('user_to_notify')->references('id')->on('users')->onDelete('cascade');
			$table->biginteger('type_id')->unsigned();
			$table->foreign('type_id')->references('id')->on('memory_notification_types')->onDelete('cascade');
			$table->biginteger('user_who_fired_event')->unsigned();
			$table->biginteger('friend_memory_id')->unsigned()->nullable();
			$table->foreign('friend_memory_id')->references('id')->on('memory_friends')->onDelete('cascade');
			$table->text('data')->nullable();
			$table->boolean('read')->default(0);
			$table->timestamps();


			$table->index('user_who_fired_event');
			$table->index('read');
			$table->index('created_at');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('memory_notifications');
	}
}
