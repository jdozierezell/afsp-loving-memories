<?php

namespace Database\Factories;

use App\Models\Memory;
use App\Models\MemoryStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Intervention\Image\Facades\Image;
use Storage;

class MemoryFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Memory::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		$cover_image= $this->random_pic('public/images/faker/');
		$path=pathinfo($cover_image);
		$thumbnail_file_path='images/faker/thumbs/'.$path['filename'].'_thumbnail.jpg';
		if(!file_exists(public_path($thumbnail_file_path)))
		{
			$resize = Image::make("public/".$cover_image)->fit(200)->encode('jpg');
			// save it locally to ~/public/images/{$hash}.jpg
			$resize->save(public_path($thumbnail_file_path));
		}

		return [
			//
			'user_id'=>User::all()->random()->id,
			'name' => $this->faker->name(),
			'cover_image' =>$cover_image,
			'loving' =>$this->random_loving(),
			'thumbnail' =>$thumbnail_file_path,
			'description' =>$this->faker->text(rand(10,500)),
			'theme_color' =>$this->faker->randomElement(['blue', 'red','pink','yellow']),
			'visible_type' => $this->faker->randomElement(['public', 'private']),
			'access_token' =>md5(uniqid(rand(), true)),
			'reminder' =>1,
			'status_id' =>MemoryStatus::all()->random()->id,
			'active' =>1
		];
	}

	function random_pic($dir)
	{
		$files = glob($dir . '/*.*');
		$file = array_rand($files);
		return str_replace("//","/",(str_replace("public/","",$files[$file])));
	}

	function random_loving()
	{
		$str="";
		for($i=1;$i<=rand(1,5);$i++)
		{
			$str .=ucwords(strtolower($this->faker->randomElement(
					['father','mother','parent','son','daughter','child','husband','wife','spouse','brother','sister','sibling',
						'grandfather','grandmother','grandparents','grandson','granddaughter','grandchild','uncle','aunt','nephew','niece','cousin']))).",";
		}
		return rtrim($str,",");
	}
}
