<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use Input;
use Dipl\User;
use Dipl\Test;
use Redirect;
use Hash;
class TestController extends Controller {

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

		$tests = User::find(Auth::id())->tests;
		return view('users.index', compact('tests'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tests/create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$test = new Test;
		$test->test_name = Input::get('test_name');
		$test->intro = Input::get('intro');
		$test->conclusion = Input::get('conclusion');
		$test->passcode = Hash::make(Input::get('passcode'));
		$test->shuffle = Input::get('shuffle');
		$user = User::find(Auth::user()->id);
		$user=(string)$user->id;
		$test->user_id = $user;
		$test->save();
		
		



		// $validation = Validator::make($input,User::rules);
		// if($validation->passes()){
		// Test::create($input);
		return Redirect::route('tests');
		// }
		// return Redirect::route('users.create')->withInput()->withErrors($validation)
		// ->with('message','There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$test = Test::find($id);
		if(is_null($test)) {
			return Redirect::route('tests');
		}
		return view('tests.edit',compact('test'));	
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
		$test = Test::find($id);
		 /**
		 
		 	TODO:
		 	- Password is not secured when you edit
		 	- 
		 
		 **/
		 
		// $test->passcode = Hash::make(Input::get('passcode'));
		$test->update($input);
		return Redirect::route('tests.index', $id);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Test::find($id)->delete();
		return Redirect::route('tests.index');
	}

}
