<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memories', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->string('name');
			$table->string('loving')->nullable();
			$table->string('cover_image')->nullable();
			$table->string('thumbnail')->nullable();
			$table->text('description')->nullable();

			$table->string('theme_color')->default('blue');
			$table->string('visible_type')->default('draft');
			$table->string('access_token', 64)->unique();
			$table->boolean('reminder')->default(0);

			$table->smallInteger('status_id')->references('id')->on('memory_status')->onDelete('cascade')->default(1);
			$table->boolean('active')->default(1);
			$table->timestamps();


			$table->index('name');
			$table->index('loving');

			$table->index('access_token');
			$table->index('visible_type');
			$table->index('reminder');
			$table->index('active');
			$table->index('status_id');
		});
	}
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('memories');
	}
}
