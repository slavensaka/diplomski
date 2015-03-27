<?php namespace Dipl\Http\Controllers;

use DB;
use Auth;
use Input;
use Route;
use Request;
use Redirect;
use Dipl\Test;
use Dipl\User;
use Dipl\Answer;
use Carbon\Carbon;
use Dipl\Question;
use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;

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
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$question = Input::all();
		if(count($question)){
		 foreach($question as $key => $value){
	  			$question_test_id = $key;
		}		
		return view('questions/create')->with('question_test_id', $question_test_id);
		} else {
			$user_id = Auth::user()->id;
			$tests = User::find($user_id)->tests;
			$question_test_id = $tests->last()->id;
			return view('questions/create')->with('question_test_id', $question_test_id);
		}
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$question = new Question;
		$question->test_id = Input::get('test_id');
		$question->question = Input::get('question');
		$question->points = Input::get('points');
		$question->shuffle_question = Input::get('shuffle_question');
		$question->type = Input::get('type');
		$question->created_at = Carbon::now();
		$question->updated_at = Carbon::now()->addMinutes(2);
		$question->save();
		$last_question_id = DB::getPdo()->lastInsertId();
		$test_id = Question::find($last_question_id)->test;
		return Redirect::action('QuestionController@show', array($test_id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) // TEST ID
	{
		$questions = Test::find($id)->questions;
		$answers = Test::find($id)->answers;
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
		if($question->type === 'multiple_choice') {
			 return view('questions.multiple_choice',compact('question','answers'));	
		} else if ($question->type === 'true_false'){
			return view('questions.true_false',compact('question','answers'));
		} else if($question->type === 'multiple_response') {
			return 'Lorem';
		} else { // 'fill_in'
			return 'Lorem';
		}
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
