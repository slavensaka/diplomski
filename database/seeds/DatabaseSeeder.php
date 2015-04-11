<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	public function run()
	{
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('TestTableSeeder');
		$this->command->info('Test table seeded!');

		$this->call('QuestionTableSeeder');
		$this->command->info('Question table seeded!');

		$this->call('AnswerTableSeeder');
		$this->command->info('Answer table seeded!');

		$this->call('StudentTableSeeder');
		$this->command->info('Student table seeded!');

		$this->call('StudentTestPivotTableSeeder');
		$this->command->info('StudentTestPivot table seeded!');

		$this->call('UserTestPivotTableSeeder');
		$this->command->info('UserTestPivot table seeded!');
	}
}