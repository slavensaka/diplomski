<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;
use Dipl\Test;
use Dipl\Answer;
use Dipl\Question;
use Illuminate\Http\Request;
use Input;
use Redirect;
use DB;
use Dipl\Support\HelperFunctions;

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
			->with('message', 'TEST IS NOW PUBLIC')
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
			->with('message', 'TEST IS NOW PRIVATE')
			->with('public', 0)
			->with('new_test_id', $new_test_id);
		}
	}

	public function take_test($test) {
		$the_test = Test::find($test); // Sav info o testu
		$questions = Test::find($test)->questions; // Sav info pitanja za dani test
		 $questions =$questions->shuffle();//OVO JE SHUFFLE ZA QUESTIONS
		$answers = [];
		if($the_test->is_published && $the_test->is_public) // Ako je published i public
		{
			


			$questions->each(function($question) use ($answers){				
				$answers["answer"] = Question::find($question->id)->answers;
			});

		    foreach ($questions as $input_key => $correct) {
		    	$answers = Question::find($correct->id)->answers;		 		
		    	  // dd($answers);
			}
		  
		    $answers = $answers->all();

       		 			
		    

		    
			return view('take_test.testing1') // TU MIJENJA
			->with('test', $the_test)
			->with('questions', $questions)
			->with('answers',$answers);



			//OVO return view('take_test.take_public_test')
			// ->with('test', $the_test)
			// ->with('questions', $questions)
			// ->with('answers',$answers);

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

	public function finished($id){
		dd(Input::all());
		(int)$correct_answer = [];
		$question_id = [];
		$new_answer = [];
		$correct_key = Input::all();
		$correct_key = array_except($correct_key, ['_token']);
		$keys = array_keys($correct_key);
		$end_value = array_merge(array($correct_key),array_map('intval', array_slice($correct_key, 0)));       
		$end_value = array_except($end_value, [0]);	

		foreach ($correct_key as $input_key => $correct) {
		 	$correct_answer[] =$correct;		 	
		}

		for ($key = 0, $size = count($keys); $key < $size; $key++) {  
			$question_id[] = (int)$keys[$key];
			}

		for ($k = 0, $size = count($end_value); $key < $size; $key++) {  

			$arr_answer[] = (int)$end_value[$key];
			}


				var_dump($question_id);
				var_dump($end_value);
				$counting = count($end_value);
				foreach ($question_id as $key => $value) {
$answer=DB::table('anwsers')->where('question_id', '=', $value)->lists('correct');
					array_unshift($answer, null);
					unset($answer[0]);

					$new_answer[] = $answer;


					}
					array_unshift($new_answer, null);
					unset($new_answer[0]);
					var_dump($new_answer);
					

					// for($i=1; $i <= $counting; $i++)
						foreach ($end_value as $key => $value) {
				
						
					}
			
		
	}

	public function testing1($id){ // test id
		// dd(Input::all());
		$points = [];
		$points_count=0;
		// $test =Test::find($id);
		$input = Input::all();
		// $questions = Test::find($id)->questions;
/**
		 * Multiple_Choice
		 */
		
		$multiple_choice = Question:: 
		where('type', '=', 'multiple_choice')
		->where('test_id', "=", $id)->get();

		$input = array_except($input, ['_token']);

	$multiple_choice_answers = $multiple_choice->map(function($other_question) {
			return $multiple_choice_answers = DB::table('anwsers')
			->where('question_id', '=', $other_question->id)
			->where("correct","=","1")->get();
		});

		$multiple_choice_answers =$multiple_choice_answers->toArray();
		$multiple_choice_answers = array_flatten($multiple_choice_answers);

		foreach($multiple_choice_answers as $multiple_answer) {
			if(in_array($multiple_answer->answer,$input)) {
				$quest = Answer::find($multiple_answer->id)->question;
				$points[] = $quest;
			}
		}

		/**
		 * True_False
		 */
		/**
		
			TODO:
			- Napravit if koji provjerava gdje je isti question_id 
			- input->question_id === answer->question_id
		
		**/
		
		$true_false = Question:: 
		where('type', '=', 'true_false')
		->where('test_id', "=", $id)->get();	

$true_false_answers = $true_false->map(function($choice_question) {
			return $true_false_answers = DB::table('anwsers')
			->where('question_id', '=', $choice_question->id)
			->where("correct","=","1")->get();
		});

$true_false_answers =$true_false_answers->toArray();
		$true_false_answers = array_flatten($true_false_answers);

		foreach($true_false_answers as $answer) {
			if(in_array($answer->answer,$input)) {
				$quest = Answer::find($answer->id)->question;
				$points[] = $quest;
			}
		}

   		/**
   		 * Multiple_Response VALJA
   		 */
   		
		$multiple_response = Question:: //Multiple_response
		where('type', '=', 'multiple_response')
		->where('test_id', "=", $id)->get();

		$input = array_except($input, ['_token']);
		$flip = array_flip($input);
		
		$answers = $multiple_response->map(function($question) use($flip) {
			return $answers = DB::table('anwsers')
			->where('question_id', '=', $question->id)
			->where("correct","=","1")->get();
		});

		$answers =$answers->toArray();
		$answers = array_flatten($answers);

		// $counting =count($answers);
		foreach($answers as $answer) {
			if(in_array($answer->answer,$input)) {
				$quest = Answer::find($answer->id)->question;
				$points[] = $quest;
			}
		}

		/**
		 * Fill_In VALJA
		 */
		
		$fill_in = Question:: 
		where('type', '=', 'fill_in')
		->where('test_id', "=", $id)->get();

		$fill_in_answers = $fill_in->map(function($fill_in_question) {
			return $fill_in_answers = DB::table('anwsers')
			->where('question_id', '=', $fill_in_question->id)
			->where("correct","=","1")->get();
		});

		$input = HelperFunctions::
		array_change_value_case($input, CASE_LOWER);
		
		$fill_in_answers =$fill_in_answers->toArray();
		$fill_in_answers = array_flatten($fill_in_answers);

		foreach($fill_in_answers as $answer) {
			$result ="";
			$result .= strtolower($answer->answer);
			if(in_array($result,$input)) {
				$quest = Answer::find($answer->id)->question;
				$points[] = $quest;
			}
		}

		
		
/* 
   Summming up the result and echoing
   ======================================================================= */
		for($i=0;$i<count($points);$i++){
			$points_count += $points[$i]["points"];
		}
		echo $points_count;
	}

}