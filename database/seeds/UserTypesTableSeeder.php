<?php

use Illuminate\Database\Seeder;

use App\UserType;

class UserTypesTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		UserType::create([
			'id' => 1,
			'name' => 'Admin'
		]);

		UserType::create([
			'id' => 2,
			'name' => 'Staff'
		]);
	}
}