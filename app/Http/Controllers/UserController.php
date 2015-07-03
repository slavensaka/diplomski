<?php namespace Dipl\Http\Controllers;

use DB;
use Auth;
use Hash;
use Input;
use Redirect;
use Dipl\User;
use Collection;
use Illuminate\Http\Request;
use Dipl\Http\Controllers\Controller;

class UserController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(User::find(Auth::id())) 
		{
			$tests = User::find(Auth::id())->tests;
 			return view('tests.index', compact('tests'));
		} else 
		  {
			return 'User is not logged in';
		  } 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('users.create');
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
		$user = User::find($id);
		return view('users.preferences')->with(compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		if(is_null($user))
		{
			return Redirect::route('users.index');
		}
		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// dd(Input::all());
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

	/**
	*
	* Getting the user
	*
	**/
	
	public function getUser($name){
		return view('tests');
	}

	public function preferences(){
		// dd(Input::all());
		DB::table('users')->where('id', Auth::id())
		->update(array('name' => Input::get("name"),'password' => Hash::make(Input::get("password"))));
		return Redirect::back()->with("message","User name and/or password changed");
	}

	public function delete_user(){
		
		$user = User::find(Auth::id());
		$user->delete();
		Auth::logout();
		return Redirect::route('/');
		
	}
	
}
