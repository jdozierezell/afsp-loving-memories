<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryAdminPreview extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memory_admin_preview', function (Blueprint $table) {
			$table->biginteger('memory_id')->unsigned()->primary();
			$table->foreign('memory_id')->references('id')->on('memories')->onDelete('cascade');
			$table->string('access_token', 64)->unique();
			$table->timestamp('expire_at')->index();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('memory_admin_preview');
	}
}
