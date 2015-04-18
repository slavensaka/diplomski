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
use Str;
use DB;
use Image;
use Config;
use Validator;
use Carbon\Carbon;
use Dipl\Support\HelperFunctions;

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
		// dd(Input::all());

		$validation = Validator::make(Input::all(), Test::$test_image_upload_rules);
	/**
	
		TODO:
		- Need to check if user inputed images else will fail
		--Call to a member function getClientOriginalName() on a non-object
		
	
	**/
	
		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		} else {

			$intro_fullname = HelperFunctions::get_slug_upload_make_image(Input::file('intro_image'));
			$conclusion_fullname = HelperFunctions::get_slug_upload_make_image(Input::file('conclusion_image'));		

			if($intro_fullname && $conclusion_fullname) {
				
				$test = new Test;
				$test->test_name = Input::get('test_name');
				$test->intro = Input::get('intro');
				$test->conclusion = Input::get('conclusion');
				$test->passcode = Hash::make(Input::get('passcode'));
				$test->intro_image = $intro_fullname;
				$test->conclusion_image = $conclusion_fullname;
				$test->shuffle = Input::get('shuffle');
				$test->is_public = Input::get('is_public');
				$user = User::find(Auth::user()->id);
				$user=(string)$user->id;
				$test->user_id = $user;
				$test->save();

				return Redirect::route('tests')
				->with('message','CREATED NEW TEST');
			}
		}
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
		// dd(Input::all());
		$validation = Validator::make(Input::all(), Test::$test_image_upload_rules);
		$passcode = Hash::make(Input::get('passcode'));
		$updated_at = Carbon::now();

		$intro_fullname = HelperFunctions::get_slug_upload_make_image(Input::file('intro_image'));
		$conclusion_fullname = HelperFunctions::get_slug_upload_make_image(Input::file('conclusion_image'));		

		DB::table('tests')->where('id', $id)->update(array(
			'test_name' => Input::get('test_name'), 'intro' => Input::get('intro'),
			'conclusion' => Input::get('conclusion'), 'shuffle' => Input::get('shuffle'),
			'passcode' => $passcode, 'updated_at' => $updated_at, 'intro_image' => $intro_fullname,
			'conclusion_image' => $conclusion_fullname
			));
		return Redirect::route('tests.index', $id)
		->with('message', 'TEST UPDATED');
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

	// public function getNameAttribute($value)
	// {
 //    return Crypt::decrypt($value);
	// }
	
	// public function setNameAttribute($value)
	// {
	//     $this->attributes['name'] = Crypt::encrypt($value);
	// }
	
}
