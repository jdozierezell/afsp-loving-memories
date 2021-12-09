<?php

namespace Database\Factories;

use App\Models\MemorySpecialDates;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemorySpecialDatesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemorySpecialDates::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
	    return [
		    //
		    'date' =>$this->faker->date('Y-m-d'),
		    'name' =>$this->faker->name('public/images/faker/'),
		    'memory_id' =>0,
	    ];
    }

	function random_pic($dir)
	{
		$files = glob($dir . '/*.*');
		$file = array_rand($files);
		return str_replace("//","/",(str_replace("public/","",$files[$file])));
	}
}
