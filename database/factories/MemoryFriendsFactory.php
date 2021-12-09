<?php

namespace Database\Factories;

use App\Models\MemoryFriends;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemoryFriendsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemoryFriends::class;

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
		    'description' =>$this->faker->text(rand(10,500)),
		    'verified' =>$this->faker->randomElement([0,1,2]),
		    'access_token' =>md5(uniqid(rand(), true)),
		    'relationship' =>ucwords(strtolower($this->faker->randomElement(['father','mother','parent','son','daughter','child','husband','wife','spouse','brother','sister','sibling','grandfather','grandmother','grandparents','grandson','granddaughter','grandchild','uncle','aunt','nephew','niece','cousin']))),
		    'image' => $this->random_pic('public/images/faker/'),
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
