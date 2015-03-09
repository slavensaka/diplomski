<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\Question as Question;

class QuestionTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('questions')->delete();

		// Question
		Question::create(array(
				'question' => 'Tko je bog',
				'points' => 5,
				'shuffle_question' => 1,
				'type' => 'fill_in',
				'test_id' => 1
			));

		// Question1
		Question::create(array(
				'question' => 'Ko je bio',
				'points' => 4,
				'shuffle_question' => 1,
				'type' => 'multiple_choice',
				'test_id' => 1
			));

		// Question2
		Question::create(array(
				'question' => 'Kako se zove',
				'points' => 5,
				'type' => 'true_false',
				'test_id' => 2
			));

		// Question3
		Question::create(array(
				'question' => 'Zasto',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'fill_in',
				'test_id' => 3
			));
	}
}