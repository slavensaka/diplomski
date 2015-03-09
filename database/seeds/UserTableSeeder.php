<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\User as User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// User
		User::create(array(
				'name' => 'Slaven',
				'email' => 'system0@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 1
			));

		// User1
		User::create(array(
				'name' => 'Marin',
				'email' => 'masa@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => '0'
			));

		// User2
		User::create(array(
				'name' => 'Ivor',
				'email' => 'ivo@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => '0'
			));

		// User3
		User::create(array(
				'name' => 'Erik',
				'email' => 'eri@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 1
			));
	}
}