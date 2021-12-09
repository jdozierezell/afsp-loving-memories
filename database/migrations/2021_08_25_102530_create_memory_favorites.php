<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryFavorites extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memory_favorites', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('image')->nullable();
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
		Schema::dropIfExists('memory_favorites');
	}
}
