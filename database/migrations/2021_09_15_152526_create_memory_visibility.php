<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryVisibility extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memory_visibility', function (Blueprint $table) {
            $table->id();
	        $table->string('email');
	        $table->biginteger('memory_id')->unsigned();
	        $table->foreign('memory_id')->references('id')->on('memories')->onDelete('cascade');
	        $table->string('access_token', 64)->unique();
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
        Schema::dropIfExists('memory_visibility');
    }
}
