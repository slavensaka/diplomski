<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Input;
use Dipl\Question;
use Dipl\Test;
use Dipl\User;
use Dipl\Answer;
use Redirect;
use DB;

class QuestionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(!Auth::check())
		{
			return redirect()->guest('auth/login');
		}
 			
			
		// $questions = Test::find($id)->questions;
		// // $tests_answers=Test::find($id)->answers;
		// $answers = Test::find($id)->answers;
		// // $posts = Test::has('comments')->get();

		// // $answers = Test::find(7)->answers->has('question_id')->get();
		//  // dd($answers);
		// return view('questions.show', compact('questions','answers'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$question = Input::all();
		// dd($question);
		if(count($question)){
		 foreach($question as $key => $value){
	  			$question_test_id = $key;
		}
		
		return view('questions/create')->with('question_test_id', $question_test_id);
		} else {
			$user_id = Auth::user()->id;
			// $users_question= User::find(3)->questions;
			$tests = User::find($user_id)->tests;
			$question_id=  DB::table('questions')->orderBy('created_at', 'desc')->first();
			
			
			return view('questions/create')->with('question_test_id', $question_id->test_id);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// dd(Input::all());
		// Question::create($input);
		// return Redirect::route('users.index');
		// $lorem=Input::all();
		// dd($lorem);
		// dd(Input::all());
		$question = new Question;
		$question->test_id = Input::get('test_id');
		$question->question = Input::get('question');
		$question->points = Input::get('points');
		$question->shuffle_question = Input::get('shuffle_question');
		$question->type = Input::get('type');
		// $user = User::find(Auth::user()->id);
		// $user=(string)$user->id;
		// $question->user_id = $user;
		
		$question->save();
		// return Redirect::action('QuestionController@show', array($test->id));

		$last_question_id = DB::getPdo()->lastInsertId();
		$test_id = Question::find($last_question_id)->test;
		return Redirect::action('QuestionController@show', array($test_id));
		// return redirect()->route('answers.show')->with('id',);




	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) // TEST ID
	{
		/**
		
			TODO:
			- ako je answer $id = 33 on trazi test od 33
			- Probaj unazad naci usera koji je ulogiran i onda
 				njegove testove prikazi
 			- Umjesto view upotrijebi Redirect::route
 			-- Mislim Da ovo valja return redirect()->back();
		
		**/
		// $users_question=User::find($id)->questions;
		
		// dd($id); Daje test id
		$questions = Test::find($id)->questions;
		// $tests_answers=Test::find($id)->answers;
		$answers = Test::find($id)->answers;
		// $posts = Test::has('comments')->get();

		// $answers = Test::find(7)->answers->has('question_id')->get();
		 // dd($answers);
		return view('questions.show', compact('questions','answers'));
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
		
		$question = Question::find($id);
		
		$answers = Question::find($id)->answers;
		

		return view('questions.edit',compact('question','answers'));	

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = Input::all();
		$question = Question::find($id);
		$question->update($input);
		// return Redirect::route('users.show', $id);
		return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Question::find($id)->delete();
		return redirect()->back();
	}

}
