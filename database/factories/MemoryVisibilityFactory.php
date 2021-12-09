<?php

namespace Database\Factories;

use App\Models\MemoryVisibility;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemoryVisibilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemoryVisibility::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
	    return [
		    //
		    'email' =>$this->faker->safeEmail(),
		    'access_token' =>md5(uniqid(rand(), true)),
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
