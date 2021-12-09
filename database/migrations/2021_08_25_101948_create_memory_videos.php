<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryVideos extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memory_videos', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('video');
			$table->string('vimeo_id')->nullable();
			$table->biginteger('memory_id')->unsigned();
			$table->foreign('memory_id')->references('id')->on('memories')->onDelete('cascade');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('memory_videos');
	}
}
