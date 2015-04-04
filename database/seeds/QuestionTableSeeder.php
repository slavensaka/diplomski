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
				'test_id' => 1,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-03-21 13:43:27")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-03-23 05:34:27"))
			));

		// Question2
		Question::create(array(
				'question' => 'Koliki je zbroj brojeva 37 i 19?',
				'points' => 4,
				'shuffle_question' => 0,
				'type' => 'multiple_choice',
				'test_id' => 1,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-02-11 18:33:23")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-02-23 11:37:20"))
			));

		// Question3
		Question::create(array(
				'question' => 'Studentski zbor RGN fakulteta osnovan je u akademskoj godini 2007./2008.',
				'points' => 5,
				'shuffle_question' => 1,
				'type' => 'true_false',
				'test_id' => 2,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-01-16 16:34:23")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-02-11 11:43:47"))
			));

		// Question4
		Question::create(array(
				'question' => 'Poskupljuje studentski život',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'true_false',
				'test_id' => 2,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-05-19 15:42:32")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-05-23 02:54:27"))
			));
		// Question5
		Question::create(array(
				'question' => 'Služite se engleskim jezikom',
				'points' => 1,
				'shuffle_question' => 1,
				'type' => 'true_false',
				'test_id' => 2,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-04-20 10:21:22")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-05-23 19:43:57"))
			));
		// Question6
		Question::create(array(
				'question' => 'Živite bez barijera',
				'points' => 5,
				'shuffle_question' => 0,
				'type' => 'true_false',
				'test_id' => 2,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-07-04 08:34:27")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-07-05 03:32:57"))
			));
		// Question7
		Question::create(array(
				'question' => 'Idete na studentske roštiljade',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'true_false',
				'test_id' => 2,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-06-05 13:34:18")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-07-13 11:24:27"))
			));
		// Question8
		Question::create(array(
				'question' => 'Example(s) of databases are (choose all that apply):',
				'points' => 3,
				'shuffle_question' => 0,
				'type' => 'multiple_response',
				'test_id' => 3,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-08-02 15:43:56")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-10-23 15:54:07"))
			));
		// Question9
		Question::create(array(
				'question' => 'A database is divided into:',
				'points' => 4,
				'shuffle_question' => 1,
				'type' => 'multiple_choice',
				'test_id' => 3,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-09-15 14:23:21")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-11-14 15:27:47"))
			));
		// Question10
		Question::create(array(
				'question' => 'Databases, software and hardware are the primary components of an information system.',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'true_false',
				'test_id' => 3,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-12-09 04:23:02")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-12-13 11:44:42"))
			));
		// Question11
		Question::create(array(
				'question' => 'Which are social medias',
				'points' => 2,
				'shuffle_question' => 0,
				'type' => 'multiple_response',
				'test_id' => 4,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-11-07 05:45:43")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-12-43 22:54:29"))
			));
		// Question12
		Question::create(array(
				'question' => 'Laravel provides database migrations',
				'points' => 5,
				'shuffle_question' => 1,
				'type' => 'true_false',
				'test_id' => 5,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-03-26 04:03:35")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-10-13 19:24:25"))
			));
		// Question13
		Question::create(array(
				'question' => 'from what movie was this qoute: Ideals are peaceful. History is violent.',
				'points' => 2,
				'shuffle_question' => 1,
				'type' => 'multiple_choice',
				'test_id' => 6,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-11-17 23:02:13")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-12-23 03:24:47"))
			));
		// Question14
		Question::create(array(
				'question' => 'Great movies are?',
				'points' => 1,
				'shuffle_question' => 0,
				'type' => 'multiple_response',
				'test_id' => 6,
				'created_at' => date('Y-m-d H:i:s',strtotime("2015-12-25 11:00:11")),
				'updated_at' => date('Y-m-d H:i:s',strtotime("2015-12-26 15:33:22"))
			));
	}
}