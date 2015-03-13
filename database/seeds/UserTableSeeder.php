<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\User as User;

class UserTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('users')->delete();

		// Use1
		User::create(array(
				'name' => 'Slaven',
				'email' => 'slaven@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 1
			));

		// User2
		User::create(array(
				'name' => 'Marin',
				'email' => 'marin@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => '0'
			));

		// User3
		User::create(array(
				'name' => 'Ivor',
				'email' => 'ivor@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => '0'
			));

		// User4
		User::create(array(
				'name' => 'Erik',
				'email' => 'erik@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 1
			));
		// User5
		User::create(array(
				'name' => 'Davor',
				'email' => 'davor@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 1
			));
		// User6
		User::create(array(
				'name' => 'Slavica',
				'email' => 'slavica@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 0
			));
		// User7
		User::create(array(
				'name' => 'Dubravka',
				'email' => 'dubravka@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 0
			));
		// User8
		User::create(array(
				'name' => 'Igor',
				'email' => 'igor@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 1
			));
		// User9
		User::create(array(
				'name' => 'Josipa',
				'email' => 'josipa@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 0
			));
		// User10
		User::create(array(
				'name' => 'Stefica',
				'email' => 'stefica@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 1
			));
		// User11
		User::create(array(
				'name' => 'Srecko',
				'email' => 'srecko@net.hr',
				'password' => Hash::make('0123'),
				'is_admin' => 1
			));
	}
}