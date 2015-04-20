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
				'intro_image' => 'tabeluaypeople-316506-1280.jpg',
				'conclusion_image' => 'j9jgnqgyfile7071266529091.jpg',
				'counter_time' => 900,
				'shuffle' => 1,
				'is_published' => 1,
				'is_public' => 1,
				'user_id' => 1
			));

		// Test2
		Test::create(array(
				'test_name' => 'Kviz o studentskom životu',
				'intro' => 'Ovo je kviz o životu studenata',
				'conclusion' => 'Završen je kviz o životu studenata',
				'passcode' => Hash::make('1234'),
				'intro_image' => 'rg0d7qyihomework-624735-1280.jpg',
				'conclusion_image' => 'y3dddtdxf164kbfz95.jpg',
				'counter_time' => 900,
				'shuffle' => 1,
				'is_published' => 1,
				'is_public' => 1,
				'user_id' => 1
			));

		// Test3
		Test::create(array(
				'test_name' => 'Baza podataka',
				'intro' => 'Test on how much you know about databases',
				'conclusion' => 'You\'ve completed the test on how much you know about databases. Congratulations!',
				'passcode' => Hash::make('1234'),
				'intro_image' => 'ng4xbmka11122773785-8603e017b0.jpg',
				'conclusion_image' => 'qgyeo20f382637881-0902bd880f.jpg',
				'counter_time' => 600,
				'shuffle' => 0,
				'is_published' => 1,
				'is_public' => 1,
				'user_id' => 2
			));

		// Test4
		Test::create(array(
				'test_name' => 'Test o društvenim mrežama',
				'intro' => 'Šta mislite o društvenim mrežama',
				'conclusion' => 'Završili ste test o društvenim mrežama',
				'passcode' => Hash::make('1234'),
				'intro_image' => 'p2d0tw17tree-200795-1280.jpg',
				'conclusion_image' => '2pmrf5clword-cloud-661058-1280.png',
				'counter_time' => 300,
				'shuffle' => 1,
				'is_published' => 1,
				'is_public' => 0,
				'user_id' => 3
			));
		// Test5
		Test::create(array(
				'test_name' => 'Test o Laravelu',
				'intro' => 'Šta znate o laravelu',
				'conclusion' => 'Gotov test o laravelu',
				'passcode' => Hash::make('1234'),
				'intro_image' => 'fmro7rf0laravel.jpg',
				'conclusion_image' => 'kigch4falaravel4-hello-72dpi.png',
				'counter_time' => 300,
				'shuffle' => 1,
				'is_published' => 0,
				'is_public' => 1,
				'user_id' => 3
			));
		// Test6
		Test::create(array(
				'test_name' => 'Kviz o popularnim filmovima',
				'intro' => 'Sve o filmovima',
				'conclusion' => 'Riješen kviz o popularnim filmovima',
				'passcode' => Hash::make('1234'),
				'intro_image' => 'rllntjtxfilm-596519-1280.jpg',
				'conclusion_image' => '0j2troeiclapper-board-152088-1280.png',
				'counter_time' => 500,
				'shuffle' => 1,
				'is_published' => 1,
				'is_public' => 1,
				'user_id' => 3
			));
	}
}