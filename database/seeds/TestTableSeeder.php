<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\Test as Test;

class TestTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('tests')->delete();

		// Test1
		Test::create(array(
				'test_name' => 'Matematika test',
				'intro' => 'Test o matematici',
				'conclusion' => 'Završili ste test o matematici',
				'passcode' => Hash::make('1234'),
				'shuffle' => 1,
				'is_published' => 1,
				'user_id' => 1
			));

		// Test2
		Test::create(array(
				'test_name' => 'Kviz o studentskom životu',
				'intro' => 'Ovo je kviz o životu studenata',
				'conclusion' => 'Završen je kviz o životu studenata',
				'passcode' => Hash::make('1234'),
				'shuffle' => 1,
				'is_published' => 1,
				'user_id' => 1
			));

		// Test3
		Test::create(array(
				'test_name' => 'Baza podataka',
				'intro' => 'Test o koliko znate bazu podataka',
				'conclusion' => 'Riješili ste test o tome koliko znate baze podataka',
				'passcode' => Hash::make('1234'),
				'shuffle' => 0,
				'is_published' => 1,
				'user_id' => 2
			));

		// Test4
		Test::create(array(
				'test_name' => 'Test o društvenim mrežama',
				'intro' => 'Šta misliste o društvenim mrežama',
				'conclusion' => 'Završili ste test o društvenim mrežama',
				'passcode' => Hash::make('1234'),
				'shuffle' => 1,
				'is_published' => 1,
				'user_id' => 3
			));
		// Test5
		Test::create(array(
				'test_name' => 'Test o Laravelu',
				'intro' => 'Šta znate o laravelu',
				'conclusion' => 'Gotov test o laravelu',
				'passcode' => Hash::make('1234'),
				'shuffle' => 1,
				'is_published' => 0,
				'user_id' => 3
			));
		// Test6
		Test::create(array(
				'test_name' => 'Kviz o popularnim filmovima',
				'intro' => 'Sve o filmovima',
				'conclusion' => 'Riješen kviz o popularnim filmovima',
				'passcode' => Hash::make('1234'),
				'shuffle' => 1,
				'is_published' => 1,
				'user_id' => 3
			));
	}
}