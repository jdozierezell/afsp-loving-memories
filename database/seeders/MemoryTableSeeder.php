<?php

namespace Database\Seeders;

use App\Models\Memory;
use Illuminate\Database\Seeder;

class MemoryTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{

		//\App\Models\User::factory(500)->create();

		\App\Models\Memory::factory(5000)->create()->each(function ($memory) {


			// Seed the relation with one address
			$favorites =\App\Models\MemoryFavorites::factory(rand(3,10))->create(['memory_id'=>$memory->id]);
			$friends =\App\Models\MemoryFriends::factory(rand(3,10))->create(['memory_id'=>$memory->id]);
			$photos =\App\Models\MemoryPhotos::factory(rand(3,10))->create(['memory_id'=>$memory->id]);
			$special_dates =\App\Models\MemorySpecialDates::factory(rand(3,10))->create(['memory_id'=>$memory->id]);
			$sharedVisibility =\App\Models\MemoryVisibility::factory(rand(3,10))->create(['memory_id'=>$memory->id]);

		});


	}
}
