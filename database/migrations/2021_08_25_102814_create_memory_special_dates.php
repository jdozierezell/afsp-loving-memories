<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemorySpecialDates extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memory_special_dates', function (Blueprint $table) {
			$table->id();
			$table->date('date');
			$table->string('name');
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
		Schema::dropIfExists('memory_special_dates');
	}
}
