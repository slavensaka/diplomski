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
			

		// dd($test->id);


	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// $users_question=User::find($id)->questions;
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
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
