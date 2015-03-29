<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;
use Dipl\Test;
use Dipl\Question;
use Illuminate\Http\Request;
use Input;
use Redirect;

class PublishController extends Controller {

	public function publish() {
		$new_test_id = Input::get('test_id');
		$test = Test::find($new_test_id);
		
		if(!$test->is_published) // ako je 0
		{ 
			$test->is_published = 1; 
			$test->save();
			return Redirect::route('tests.index')
			->with('message','TEST PUBLISHED')
			->with('published', 1)
			->with('new_test_id',$new_test_id);
		} 
	}

	public function unpublish() {
		// dd(Input::all());
		$new_test_id = Input::get('test_id');
		$test = Test::find($new_test_id);
		if($test->is_published) // ako je 1
		{ 
			$test->is_published = 0;
			$test->save();
			return Redirect::route('tests.index')
			->with('message', 'TEST UNPUBLISHED')
			->with('published', 0)
			->with('new_test_id', $new_test_id);
		}
	}

	public function is_private(){ // za public mora biti 0
		$new_test_id = Input::get('test_id');
		$test = Test::find($new_test_id);
		if(!$test->is_public) 
		{
			$test->is_public = 1;
			$test->save();
			return Redirect::route('tests.index')
			->with('message', 'TEST JE SADA PUBLIC')
			->with('public', 1)
			->with('new_test_id', $new_test_id);
		}
	}

	public function is_public() { // za private mora biti 1 
		$new_test_id = Input::get('test_id');
		$test = Test::find($new_test_id);
		if($test->is_public) 
		{
			$test->is_public = 0;
			$test->save();
			return Redirect::route('tests.index')
			->with('message', 'TEST JE SADA PRIVATE')
			->with('public', 0)
			->with('new_test_id', $new_test_id);
		}
	}

	public function take_test($test) {
		$the_test = Test::find($test); // Sav info o testu
		$questions = Test::find($test)->questions; // Sav info pitanja za dani test
		
		if($the_test->is_published && $the_test->is_public) // Ako je published i public
		{
			   // dd($the_test);
			// dd($questions);
			// foreach ($questions as $key => $question) {
			// 	// dd($question->id);
			// 	// $answers = Question::find($question->id)->answers;
				
			// }

			// $questions->each(function($question)
   // 			 {
   //     		 $answers = Question::find($question->id)->answers;
		 //       		 $answers->each(function($answer)
		 //       		 {
		 //       		 		$answers_in_array= $answer->toArray();
   //     		 				dd($answers_in_array);
		 //        // 	 echo "<h3>$answer->answer</h3>";
		 //        });

		 //    });



			return view('take_test.take_public_test', 
				compact('the_test','questions'));

			// for($i=1; $i <= $count; $i++)
   //          {
   //              DB::table('anwsers')->where('id', Input::get("answer_id_form.$i"))
   //              ->update(array('answer' => current(Input::get("answer_form")[$i]),
   //              'correct' => current(Input::get("correct_form")[$i]) ));
			// } 

			// $lorem = $questions->each(function($question)
			// {
  			// var_dump( $question->id,$question->question);

			// });




		} else if($the_test->is_published) // Ako je published, a nije public, nego private
		{
			return 'Enter Password';

		} else // Ako nije ni published, ni public
		{
			return 'Hacker ne smije uči';
		}

	}

}