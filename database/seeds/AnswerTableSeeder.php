<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\Answer as Answer;

class AnswerTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('anwsers')->delete();

		// Answer
		Answer::create(array(
				'answer' => 'Women',
				'correct' => 1,
				'question_id' => 1
			));

		// Answer1
		Answer::create(array(
				'answer' => 'Pero',
				'correct' => 1,
				'question_id' => 1
			));

		// Answer2
		Answer::create(array(
				'answer' => 'Duro',
				'correct' => 0,
				'question_id' => 2
			));

		// Answer3
		Answer::create(array(
				'answer' => 'Eto.',
				'correct' => 1,
				'question_id' => 3
			));
	}
}