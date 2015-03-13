<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\Test as Test;

class TestTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('tests')->delete();

		// Test
		Test::create(array(
				'test_name' => 'ime_testa',
				'intro' => 'Ovo je intro',
				'conclusion' => 'Ovo je kraj',
				'passcode' => Hash::make('1234'),
				'shuffle' => 1,
				'user_id' => 1
			));

		// Test1
		Test::create(array(
				'test_name' => 'Quizovi',
				'intro' => 'Intro1',
				'conclusion' => 'Ovo je kraj',
				'passcode' => Hash::make('1234'),
				'shuffle' => 1,
				'user_id' => 1
			));

		// Test2
		Test::create(array(
				'test_name' => 'Loremi',
				'intro' => 'Intro',
				'conclusion' => 'Nikad Vise',
				'passcode' => Hash::make('1234'),
				'shuffle' => 0,
				'user_id' => 2
			));

		// Test3
		Test::create(array(
				'test_name' => 'Neki_test',
				'intro' => 'Nekad',
				'conclusion' => 'Zasto',
				'passcode' => Hash::make('1234'),
				'shuffle' => 1,
				'user_id' => 3
			));
	}
}