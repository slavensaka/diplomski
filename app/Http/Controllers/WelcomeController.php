<?php namespace Dipl\Http\Controllers;

use DB;
use Dipl\Tests;
use Dipl\User;
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
		// $published_tests = DB::table('tests')->select('is_published','id')->get();
		// $array_flattened = array_pluck($published_tests, 'is_published');
			// $user = DB::
			// $published_tests = DB::table('tests')->where('is_published','=', 1)->get();
			$users_published_tests =DB::table('users')
            	->join('tests', 'users.id', '=', 'tests.user_id')
            	->where('is_published','=', 1)
            	->select('users.name', 'tests.id', 'tests.test_name',
            	       'tests.intro', 'tests.conclusion', 'tests.shuffle',
            	       'tests.user_id', 'tests.is_published')->get();


			// foreach ($array_flattened as $published) {
			// 	if($published === 1) {
					
			// 	} else echo  'Dolem';
			// }



		return view('welcome')->with('users_published_tests', $users_published_tests);
	}

}
