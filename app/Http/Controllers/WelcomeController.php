<?php namespace Dipl\Http\Controllers;

use DB;
use Dipl\Test;
use Dipl\User;
use Dipl\Tag;

class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
	
			$users_published_tests_public =DB::table('users')
            	->join('tests', 'users.id', '=', 'tests.user_id')
            	->where('tests.is_published','=', 1)
            	->where('tests.is_public','=', 1)
            	->select('users.name', 'tests.id', 'tests.test_name',
            	       'tests.intro', 'tests.conclusion', 'tests.shuffle',
            	       'tests.user_id', 'tests.is_published','tests.is_public',
            	       'tests.intro_image', 'tests.conclusion_image')
            	->get();

            $users_published_tests_private =DB::table('users')
            	->join('tests', 'users.id', '=', 'tests.user_id')
            	->where('tests.is_published','=', 1)
            	->where('tests.is_public','=', 0)
            	->select('users.name', 'tests.id', 'tests.test_name',
            	       'tests.intro', 'tests.conclusion', 'tests.shuffle',
            	       'tests.user_id', 'tests.is_published','tests.is_public',
            	       'tests.intro_image', 'tests.conclusion_image')
            	->get();
		return view('welcome')
		->with('users_published_tests_public', $users_published_tests_public)
		->with('users_published_tests_private',$users_published_tests_private);
	}

	

}
