<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Input;
use Dipl\Answer;
use Redirect;
use Test;
use Dipl\Question;
use DB;
use Illuminate\Support\Collection;

class AnswerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		
		$type = Input::get('type');
		$quest_id = Input::get('quest_id');
		$quest = DB::table('questions')->where('id', $quest_id)->first();

		return view('answers/create')->with(['type' => $type, 'quest' => $quest]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// dd(Input::all());

		$answer = new Answer;
		$answer->answer = Input::get('answer');
		$answer->correct = Input::get('correct');
		$answer->question_id = Input::get('quest_id');
		$answer->save();
		return Redirect::back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$quest = Question::find($id)->test;

		dd($id); // question id
		
		return Redirect::action('QuestionController@show', array($test->id));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$collection = Input::all();
		$real_answer = Answer::find($id);

		$second = array_slice($collection, 3, 1);
		$correct = $second[0][0];

		$answer = Input::get('answer');
		$correct = $correct;
		$real_answer->update(['answer' => $answer, 'correct' => $correct ]);

		$question = Answer::find($id)->question;
		$test = Question::find($question->test_id)->test;
		// dd($test);
		return Redirect::back();
// 
// $test = new Test;
// 		$test->test_name = Input::get('test_name');
// 		$test->intro = Input::get('intro');
// 		$test->conclusion = Input::get('conclusion');
// 		$test->passcode = Input::get('passcode');
// 		$test->shuffle = Input::get('shuffle');
// 		$user = User::find(Auth::user()->id);
// 		$user=(string)$user->id;
// 		$test->user_id = $user;
// 		$test->save();

		// $answer->update($input);
		// $question = Test::find(1)->questions;
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Answer::find($id)->delete();
		return redirect()->back();
	}

}
