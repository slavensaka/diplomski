<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Dipl\Question as Question;

class QuestionTableSeeder extends Seeder {
 // 192 T1
 // 56 T2
 // DA T3
 // DA T4
 // DA T5
 // DA T6
 //NE T7
 //8the InternetTRUE(a library catalogue,an article index,a computerized warehouse inventory)
 // 9TRUE(records) fields articles names
 // 10False
 //11TRUE(facebook, linkedin,twitter,flickr)
 //12true
 //13TRUE(FURY),Apocalypse Now,Black Hawk Down,platoon
 //14TRUE(terminator, birdman, interstellar) ,Gigli

	public function run()
	{
		//DB::table('questions')->delete();

		// Question1
		Question::create(array(
				'question' => 'Koliko zajedno znamenaka ima prvih 100 prirodnih brojeva?',
				'points' => 5,
				'shuffle_question' => 1,
				'type' => 'multiple_choice',
				'test_id' => 1
			));

		// Question2
		Question::create(array(
				'question' => 'Koliki je zbroj brojeva 37 i 19?',
				'points' => 4,
				'shuffle_question' => 0,
				'type' => 'multiple_choice',
				'test_id' => 1
			));

		// Question3
		Question::create(array(
				'question' => 'Studentski zbor RGN fakulteta osnovan je u akademskoj godini 2007./2008.',
				'points' => 5,
				'shuffle_question' => 1,
				'type' => 'fill_in',
				'test_id' => 2
			));

		// Question4
		Question::create(array(
				'question' => 'Poskupljuje studentski život',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'fill_in',
				'test_id' => 2
			));
		// Question5
		Question::create(array(
				'question' => 'Služite se engleskim jezikom',
				'points' => 1,
				'shuffle_question' => 1,
				'type' => 'fill_in',
				'test_id' => 2
			));
		// Question6
		Question::create(array(
				'question' => 'Živite bez barijera',
				'points' => 5,
				'shuffle_question' => 0,
				'type' => 'fill_in',
				'test_id' => 2
			));
		// Question7
		Question::create(array(
				'question' => 'Idete na studentske roštiljade',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'fill_in',
				'test_id' => 2
			));
		// Question8
		Question::create(array(
				'question' => 'Example(s) of databases are (choose all that apply):',
				'points' => 3,
				'shuffle_question' => 0,
				'type' => 'multiple_response',
				'test_id' => 3
			));
		// Question9
		Question::create(array(
				'question' => 'A database is divided into:',
				'points' => 4,
				'shuffle_question' => 1,
				'type' => 'multiple_choice',
				'test_id' => 3
			));
		// Question10
		Question::create(array(
				'question' => 'Databases, software and hardware are the primary components of an information system.',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'true_false',
				'test_id' => 3
			));
		// Question11
		Question::create(array(
				'question' => 'Which are social medias',
				'points' => 2,
				'shuffle_question' => 0,
				'type' => 'multiple_response',
				'test_id' => 4
			));
		// Question12
		Question::create(array(
				'question' => 'Laravel provides database migrations',
				'points' => 5,
				'shuffle_question' => 1,
				'type' => 'true_false',
				'test_id' => 5
			));
		// Question13
		Question::create(array(
				'question' => 'from what movie was this qoute: Ideals are peaceful. History is violent.',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'multiple_choice',
				'test_id' => 6
			));
		// Question14
		Question::create(array(
				'question' => 'Great movies are?',
				'points' => 1,
				'shuffle_question' => 0,
				'type' => 'multiple_response',
				'test_id' => 6
			));
	}
}