<?php

use App\Models\MemoryNotificationTypes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemoryNotificationTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memory_notification_types', function (Blueprint $table) {
            $table->id();
	        $table->string('type');


	        $table->index('type');
        });

	    $data = [
		    ['type'=>'memory_submitted'],
		    ['type'=>'memory_approved'],
		    ['type'=>'memory_rejected'],
		    ['type'=>'memory_friend_submitted'],
		    ['type'=>'memory_friend_approved_owner'],
		    ['type'=>'memory_friend_approved_admin'],
		    ['type'=>'memory_friend_rejected_owner'],
		    ['type'=>'memory_friend_rejected_admin'],
		    ['type'=>'memory_resubmitted'],
	    ];
	    MemoryNotificationTypes::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('memory_notification_types');
    }
}
