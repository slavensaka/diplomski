<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\Answer as Answer;

class AnswerTableSeeder extends Seeder {

	public function run()
	{
		//DB::table('anwsers')->delete();

		// Answer1
		Answer::create(array(
				'answer' => '192',
				'correct' => 1,
				'question_id' => 1
			));
		// Answer2
		Answer::create(array(
				'answer' => '52',
				'correct' => 0,
				'question_id' => 1
			));

		// Answer3
		Answer::create(array(
				'answer' => '56',
				'correct' => 1,
				'question_id' => 2
			));

		// Answer4
		Answer::create(array(
				'answer' => '23',
				'correct' => 0,
				'question_id' => 2
			));

		// Answer5
		Answer::create(array(
				'answer' => '1',
				'correct' => 0,
				'question_id' => 2
			));
		// Answer6
		Answer::create(array(
				'answer' => 'DA',
				'correct' => 1,
				'question_id' => 3
			));
		// Answer7
		Answer::create(array(
				'answer' => 'DA',
				'correct' => 1,
				'question_id' => 4
			));
		// Answer8
		Answer::create(array(
				'answer' => 'DA',
				'correct' => 1,
				'question_id' => 5
			));
		// Answer9
		Answer::create(array(
				'answer' => 'DA',
				'correct' => 1,
				'question_id' => 5
			));
		// Answer10
		Answer::create(array(
				'answer' => 'DA',
				'correct' => 1,
				'question_id' => 6
			));
		// Answer11
		Answer::create(array(
				'answer' => 'NE',
				'correct' => 1,
				'question_id' => 7
			));
		// Answer12
		Answer::create(array(
				'answer' => 'a library catalogue',
				'correct' => 1,
				'question_id' => 8
			));
		// Answer13
		Answer::create(array(
				'answer' => 'an article index',
				'correct' => 1,
				'question_id' => 8
			));
		// Answer14
		Answer::create(array(
				'answer' => 'a computerized warehouse inventory',
				'correct' => 1,
				'question_id' => 8
			));
		// Answer15
		Answer::create(array(
				'answer' => 'the Internet',
				'correct' => 0,
				'question_id' => 8
			));
		// Answer16
		Answer::create(array(
				'answer' => 'records',
				'correct' => 1,
				'question_id' => 9
			));
		// Answer17
		Answer::create(array(
				'answer' => 'fields',
				'correct' => 0,
				'question_id' => 9
			));
		// Answer18
		Answer::create(array(
				'answer' => 'fields',
				'correct' => 0,
				'question_id' => 9
			));
		// Answer19
		Answer::create(array(
				'answer' => 'fields',
				'correct' => 0,
				'question_id' => 9
			));
		// Answer20
		Answer::create(array(
				'answer' => 'false',
				'correct' => 1,
				'question_id' => 10
			));
		// Answer21
		Answer::create(array(
				'answer' => 'true',
				'correct' => 0,
				'question_id' => 10
			));
		// Answer22
		Answer::create(array(
				'answer' => 'facebook',
				'correct' => 1,
				'question_id' => 11
			));
		// Answer23
		Answer::create(array(
				'answer' => 'twitter',
				'correct' => 1,
				'question_id' => 11
			));
		// Answer24
		Answer::create(array(
				'answer' => 'linkedin',
				'correct' => 1,
				'question_id' => 11
			));
		// Answer25
		Answer::create(array(
				'answer' => 'flickr',
				'correct' => 0,
				'question_id' => 11
			));
		// Answer26
		Answer::create(array(
				'answer' => 'true',
				'correct' => 1,
				'question_id' => 12
			));
		// Answer27
		Answer::create(array(
				'answer' => 'false',
				'correct' => 0,
				'question_id' => 12
			));
		// Answer28
		Answer::create(array(
				'answer' => 'Fury',
				'correct' => 1,
				'question_id' => 13
			));
		// Answer29
		Answer::create(array(
				'answer' => 'Apocalypse Now',
				'correct' => 0,
				'question_id' => 13
			));
		// Answer30
		Answer::create(array(
				'answer' => 'Black Hawk Down',
				'correct' => 0,
				'question_id' => 13
			));
		// Answer31
		Answer::create(array(
				'answer' => 'Platoon',
				'correct' => 0,
				'question_id' => 13
			));
		// Answer32
		Answer::create(array(
				'answer' => 'Terminator',
				'correct' => 1,
				'question_id' => 14
			));
		// Answer33
		Answer::create(array(
				'answer' => 'Gigli',
				'correct' => 0,
				'question_id' => 14
			));
		// Answer34
		Answer::create(array(
				'answer' => 'Birdman',
				'correct' => 1,
				'question_id' => 14
			));
		// Answer35
		Answer::create(array(
				'answer' => 'Interstellar',
				'correct' => 1,
				'question_id' => 14
			));
	}
}

