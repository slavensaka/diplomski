<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;
use Dipl\Test;
use Dipl\User;
use Dipl\Answer;
use Dipl\Question;
use Illuminate\Http\Request;
use Input;
use Redirect;
use DB;
use Dipl\Student;
use Dipl\UserTestPivot;
use Hash;
use View;
use Carbon\Carbon;
use Auth;
use Session;
use Dipl\StudentTestPivot;
use Dipl\Support\HelperFunctions;
use Illuminate\Http\Response;

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

	/* 
	   TAKE_TEST: Check if Published and public, and return test, questions, answers
	   ========================================================================== */

	public function take_test($test) {

		$answers = [];
		$student_name = '';
		$the_test = Test::find($test); // Sav info o testu
		$questions = Test::find($test)->questions; // Sav info pitanja za dani test

		//SHUFFLE QUESTIONS (Preko Test shufflea)
		if($the_test->shuffle){  
		 	$questions =$questions->shuffle();
		}

		if(Auth::check()){
			$student_name = Auth::user()->name;
		} else {
			// if(!Session::has('student_name')){
				$numberrand = rand(1, 1000);
				// $string = str_random(5);
				$student_name = "User$numberrand"; 
			// }
		}
		if($the_test->is_published && $the_test->is_public){ // Ako je published i public
			$questions->each(function($question) use ($answers){				
				$answers["answer"] = Question::find($question->id)->answers;
			});
			foreach ($questions as $input_key => $correct) {
		    	$answers = Question::find($correct->id)->answers;		 		
			}
			if(!count($answers)){
				return 'No answers are added on this test';
			}
		    $answers = $answers->all();

			return view('take_test.testing1') // TU MIJENJA
			->with('test', $the_test)
			->with('questions', $questions)
			->with('answers',$answers)
			->with('student_name',$student_name);

			//OVO return view('take_test.take_public_test')
			// ->with('test', $the_test)
			// ->with('questions', $questions)
			// ->with('answers',$answers);

		} else if($the_test->is_published && $the_test->is_public === 0) // Ako je published, a nije public, nego private
		{	
			
			$questions->each(function($question) use ($answers){				
				$answers["answer"] = Question::find($question->id)->answers;
				
				
			});
			foreach ($questions as $input_key => $correct) {
		    	$answers = Question::find($correct->id)->answers;		 		
			}
			$created_by = Test::find($the_test->id)->user;
			if(!count($answers)){
				return 'No answers are added on this test';
			} 
		    $answers = $answers->all();
			 return view('take_test.private')
			->with('test', $the_test)
			->with('questions', $questions)
			->with('answers',$answers)
			->with('created_by',$created_by->name);

		} else // Ako nije ni published, ni public
		{
			 //'Hacker no entry';
			return view('/');
		}

	}
/* 
   TAKE_PRIVATE_TEST: 
   ========================================================================== */



	public function take_private_test($test) {
		// dd(Input::all());
		// dd(Input::get('student_name');
		$student_name='';
		if(Auth::check()){
			$student_name = Auth::user()->name;
		} else {
			$student_name = Input::get('student_name');

			$student = Student::where('student_name', '=', $student_name)->exists();
			$user = User::where('name', '=', $student_name)->exists();
			if($student || $user){
				return Redirect::back()->with('message','Username already taken');  
			}
		}	


		$answers = [];
		$the_test = Test::find($test); // Sav info o testu
		$questions = Test::find($test)->questions; // Sav info pitanja za dani test



		if (Hash::check(Input::get('passcode'), $the_test->passcode))
		{
    
			//SHUFFLE QUESTIONS (Preko Test shufflea)
			if($the_test->shuffle){  
			 	$questions =$questions->shuffle();
			}

			if($the_test->is_published && $the_test->is_public===0){ // Ako je published i public
				
				$questions->each(function($question) use ($answers){				
					$answers["answer"] = Question::find($question->id)->answers;
				});

				foreach ($questions as $input_key => $correct) {
			    	$answers = Question::find($correct->id)->answers;		 		
				}
			    $answers = $answers->all();

				return view('take_test.testing1') // TU MIJENJA
				->with('message','You have entered a correct passcode')
				->with('test', $the_test)
				->with('questions', $questions)
				->with('answers',$answers)
				->with('student_name',$student_name);
			}
		} else {
			return Redirect::back()
            ->with('message','Incorrect passcode');          
		}
}

/* 
	FINISHED:    
   ========================================================================== */

	public function finished($id){
		// dd(Input::all());
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
/**

	TODO:
	- For test password make the interface 
	- If question has no answers, alert user somehow. Maybe when he tries to publish it
	- Make a submit time(vrijeme test) 10 minuta. After end submit the test
	- prevent multiple inserts when submitting a test in PHP

**/

	public function testing1($id){ // test id
		// dd(Input::all());
		$points = [];
		$correct_points = [];
		$points_decrease = [];
		$points_count=0;
		$test =Test::find($id);
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
		$keys = array_keys($input);

		foreach($multiple_choice_answers as $multiple_answer) {
			if(in_array($multiple_answer->answer,$input)) {
				$quest = Answer::find($multiple_answer->id)->question;
				$points[] = $quest;

				$answer_correct = Answer::find($multiple_answer->id);
				$correct_points[] =$answer_correct;
			}
		}

		/**
		 * True_False
		 */
		
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
 			$a = array_fill_keys($keys, $answer->answer); 
 			if (isset($input[$answer->question_id])) {
				if($answer->answer === $input[$answer->question_id] ) {
					$quest = Answer::find($answer->id)->question;
					$points[] = $quest;

					$answer_correct = Answer::find($answer->id);
					$correct_points[] =$answer_correct;
    			}
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
		// dd($input);
		// dd($answers);
		// $counting =count($answers);
		foreach($answers as $answer) {
			if(in_array($answer->answer,$input)) {
				$quest = Answer::find($answer->id)->question;
				$points[] = $quest;
				// dd($points);
				$answer_correct = Answer::find($answer->id);
				$correct_points[] =$answer_correct;

			}
		}
		//If the input are incorrect answers, reduce count
		$incorrect_answers = $multiple_response->map(function($question) use($flip) {
			return $incorrect_answers = DB::table('anwsers')
			->where('question_id', '=', $question->id)
			->where("correct","=","0")->get();
		});
		$incorrect_answers =$incorrect_answers->toArray();
		$incorrect_answers = array_flatten($incorrect_answers);
		foreach($incorrect_answers as $answer) {
			if(in_array($answer->answer,$input)) {
				$quest = Answer::find($answer->id)->question;
				$points_decrease[] = $quest;
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

		$input = HelperFunctions::array_change_value_case($input, CASE_LOWER);
		
		$fill_in_answers =$fill_in_answers->toArray();
		$fill_in_answers = array_flatten($fill_in_answers);

		foreach($fill_in_answers as $answer) {
			$result ="";
			$result .= strtolower($answer->answer);
			if(in_array($result,$input)) {
				$quest = Answer::find($answer->id)->question;
				$points[] = $quest;

				$answer_correct = Answer::find($answer->id);
				$correct_points[] =$answer_correct;
			}
		}

		/* Summming up the result and echoing */
		for($i=0;$i<count($points);$i++){
			$points_count += $points[$i]["points"];
		}

		for($i=0;$i<count($points_decrease);$i++){
			$points_count -= $points_decrease[$i]["points"];
		}
	
		$questions = Test::find($test->id)->questions;
		$answers = Test::find($test->id)->answers;

		
		
		$user = User::where('name', '=', Input::get('student_name'))->first();
		
		if($user){
			$new_user = new UserTestPivot;
			$new_user->user_id = $user->id;
			$new_user->test_id = $test->id;
			$new_user->test_result = $points_count;
			$new_user->save();

		} else {
			$student = Student::where('student_name', '=', Session::get('student_name'))->first();

			if(!$student){
			$random = HelperFunctions::generate_password();
			$hashed_password = Hash::make($random);
			$user = new Student;
			$user->student_name =Input::get('student_name');
			$user->pass = $hashed_password;
			$saved =$user->save();

			$last_id=DB::getPdo()->lastInsertId();

			$user = new StudentTestPivot;
			$user->student_id = $last_id;
			$user->test_id = $test->id;
			$user->test_result = $points_count;
			$user->save();

			if($saved){
				Session::put('student_name', Input::get('student_name'));
				Session::put('pass', $random);
			}

			} else {

			$user = new StudentTestPivot;
			$user->student_id = $student->id;
			$user->test_id = $test->id;
			$user->test_result = $points_count;
			$user->save();

			}
						
			
		}

		 return View::make('take_test/result_show')
         ->with(compact('correct_points','test','questions','answers'))
         ->with('points_count', $points_count)
         ->with('student_name', Input::get('student_name'))
         ->with('student_name',Session::get('student_name'));

		// return redirect()->route('result',
		// 	[$test->id, 'points_count' => $points_count, 
		// 	'student_name' => Input::get('student_name'),
		// 	'correct_points' => $correct_points]);
	}


	public function tests_taken(){
		// dd(Auth::user()->name);
		// dd(Input::all());
		$test_info = [];
		if(Auth::check()){
			 // $taken_tests = User::find(Auth::user()->id)->taken_tests;

			$taken_tests =DB::table('users')
			 ->join('test_user', 'users.id', '=', 'test_user.user_id')
			 // ->where('test_user.test_id', '=', $taken_test->id)
		 	 ->where("test_user.user_id","=",Auth::user()->id)
             ->select('users.name', 'test_user.user_id', 'test_user.test_id',
    			'test_user.test_result','test_user.created_at','test_user.id')->get();

		return View::make('take_test/tests_taken')
		->with('taken_tests',$taken_tests)
		->with('test_info',$test_info);
		} else {
			

			
			$student_id = Student::where('student_name', 
				'=', Session::get('student_name'))->first();
				
			$taken_tests =DB::table('students')
			 ->join('student_test', 'students.id', '=', 'student_test.student_id')
			 // ->where('student_test.test_id', '=', $taken_test->id)
		 	 ->where("student_test.student_id","=",$student_id->id)//TU
             ->select('students.student_name', 'student_test.student_id', 'student_test.test_id',
    			'student_test.test_result','student_test.created_at','student_test.id')->get();
             // dd($taken_tests);
        return View::make('take_test/tests_taken_students')
		->with('taken_tests',$taken_tests);
		}
		
	}

	public function delete_taken_test($test_id){
		// dd($test_id);
		// dd(Input::all());
		if(Auth::check()){
			DB::table('test_user')
			->where('user_id', '=',Auth::user()->id)
			->where('test_id', '=', $test_id)
			->where('id','=',Input::get('id'))->delete();
			return Redirect::back(); 
		} else {
			$student=Student::where('student_name','=',Session::get('student_name'))->first();
			DB::table('student_test')
			->where('student_id', '=',$student->id)
			->where('test_id', '=', $test_id)
			->where('id','=',Input::get('id'))->delete();
			return Redirect::back(); 
		}	
	}

	public function copy_public_test($test_id) {

		$test = Test::find($test_id);
		
		$new_test = new Test;
		$new_test->test_name = $test->test_name;
		$new_test->intro = $test->intro;
		$new_test->conclusion = $test->conclusion;
		$new_test->null; // WHAT
		$new_test->intro_image = $test->intro_image;
		$new_test->conclusion_image = $test->conclusion_image;
		$new_test->shuffle = $test->shuffle;
		$new_test->is_public = $test->is_public;
		$new_test->user_id = Auth::user()->id;
		$new_test->save();
		
		$last_id=DB::getPdo()->lastInsertId();

		$questions = Test::find($test_id)->questions;
		foreach($questions as $question){
			$new_question = new Question;
			$new_question->question = $question->question;
			$new_question->points = $question->points;
			$new_question->question_image = $question->question_image;
			$new_question->shuffle_question = $question->shuffle_question;
			$new_question->type = $question->type;
			$new_question->created_at = Carbon::now();
			$new_question->updated_at = Carbon::now()->addMinutes(2);
			$new_question->test_id = $last_id;
			$new_question->save();

		}

			foreach($questions as $key => $question){
			$questions_last = Test::find($last_id)->questions;
			$answers = Question::find($question->id)->answers;
			foreach($answers as $answer){
				$new_answer = new Answer;
				$new_answer->answer = $answer->answer;
				$new_answer->correct = $answer->correct;
				$new_answer->question_id = $questions_last[$key]["id"];
				$new_answer->save();
			}
		}
		// if(User::find(Auth::id())) 
		// {
		// 	$tests = User::find(Auth::id())->tests;
 	// 		return view('users.index', compact('tests'))
 	// 		->with('message',"The public test has been copied to your panel.");
		// } 
		return Redirect::route('tests')
		->with('message',"The public test \"$test->test_name\" has been copied to your panel."); 
	}

	//Show_tests_taken: display the test user has taken 
	public function show_tests_taken($test_id){

		// dd(Input::all());
		$questions = Test::find($test_id)->questions;
		$answers = Test::find($test_id)->answers;
		return view('take_test.show_tests_taken', compact('questions','answers'))
		->with('test_result',Input::get('test_result'));
	}

	public function your_students(){
		// return Auth::id();
		if(Auth::check()){
			 // $taken_tests = User::find(Auth::user()->id)->taken_tests;


             $your_users =DB::table('tests')
			 ->join('test_user', 'tests.id', '=', 'test_user.test_id')
			 // ->join('student_test','tests.id', '=','student_test.test_id')
			 // ->where('test_user.test_id', '=', $taken_test->id)
		 	 ->where("tests.user_id","=",Auth::id())
		 	 // ->groupBy('test_user.test_id')
             // ->select('tests.id','tests.test_name','tests.user_id','tests.created_at',
             // 	'test_user.id', "loki"=>'test_user.user_id','test_user.test_id','test_user.test_result',
             // 	'test_user.created_at')
				->get();

              $your_students =DB::table('tests')
			 ->join('student_test', 'tests.id', '=', 'student_test.test_id')
			 // ->join('student_test','tests.id', '=','student_test.test_id')
		 	 ->where("tests.user_id","=",Auth::id())
		 	 // ->where('student_test.test_id', '=', )
		 	 // ->groupBy('student_test.test_id')
             // ->select('tests.id','tests.test_name','tests.user_id','tests.created_at',
             // 	'student_test.id', 'student_test.student_id','student_test.test_id','student_test.test_result',
             // 	'student_test.created_at')
             ->get();

             $result = array_merge($your_users,$your_students);
             // dd($result);
			return View::make('take_test/your_students')
			
			->with('your_students', $result);
		}
	}

}






