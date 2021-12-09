<?php

use App\Models\MemoryStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryStatus extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('memory_status', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->index('name');
		});

		$data = [
			['name'=>'draft'],
			['name'=>'submitted'],
			['name'=>'approved'],
			['name'=>'rejected'],
		];
		MemoryStatus::insert($data);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('memory_status');
	}
}
