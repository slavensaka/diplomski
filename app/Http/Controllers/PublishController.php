<?php namespace Dipl\Http\Controllers;

use Dipl\Http\Requests;
use Dipl\Http\Controllers\Controller;
use Dipl\Test;
use Illuminate\Http\Request;
use Input;
use Redirect;

class PublishController extends Controller {
	
	// protected $test;

	// public function __construct(Test $test) {
	// 	$this->test = $test;
	// }	

	public function publish() {
		// dd(Input::all());
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
}