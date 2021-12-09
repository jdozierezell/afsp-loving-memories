<?php

namespace Database\Factories;

use App\Models\MemoryNotifications;
use App\Models\MemoryNotificationTypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemoryNotificationsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemoryNotifications::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
	    return [
		    //
		    'memory_id' =>0,
		    'user_to_notify' =>0,
		    'type_id' =>MemoryNotificationTypes::all()->random()->id,
		    'user_who_fired_event' =>0,
		    'friend_memory_id' =>0,
		    'data' =>''

	    ];
    }

	function random_pic($dir)
	{
		$files = glob($dir . '/*.*');
		$file = array_rand($files);
		return str_replace("//","/",(str_replace("public/","",$files[$file])));
	}
}
