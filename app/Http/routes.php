<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
*
* Default index Route
*
**/
Route::get('/', 'WelcomeController@index');

/**
*
* User logged in and is at home
*
**/
Route::get('home', 'HomeController@index');

/**
*
* Tests
*
**/

Route::get('tests', array('as' => 'tests','uses' => 'TestController'));

/**
*
* Controllers to auth the user
*
**/
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
*
* Experimental UserController crud resource
*
**/

Route::resource('users', 'UserController');
Route::resource('tests', 'TestController');


/**
*
* Creating questions
*
**/
Route::resource('questions','QuestionController');


/**
*
* Po imenu route, Pogledaj u HomeController
*
**/


Route::get('tests/{name}', function(){
	return 'Hello';
});


/**
*
* Experimental userform
*
**/

Route::post('userform', function() {
	// return Redirect::to('userresults')->withInput(Input::only('username','color'));
	$rules = array(
		'email' => 'required|email|different:username',
		'username' => 'required|min:6',
		'password' => 'required|same:password_confirm'
	);
	$validation = Validator::make(Input::all(), $rules);
	if ($validation->fails())
	{
		return Redirect::to('userform')->withErrors($validation)->withInput();
	}
	return Redirect::to('userresults')->withInput();
});

Route::get('userresults', function() {
	// return 'Your username is: ' . Input::old('username'). '<br>Your favorite color is: ' .
	// Input::old('color');
	return dd(Input::old());
});

/**
*
* Experimental form
*
**/

// Route::get('users/{name}', 'UserController@showProfile');

/**
*
* Experimental file uploader
*
**/

Route::get('fileform', function()
{
	return view('fileform');
});

Route::post('fileform', function()
{
	$file = Input::file('myfile');
    $ext = $file->guessExtension();
    if ($file->move('files', 'newfilename.' . $ext))
	{
		return 'Success';
 	}
 	else
 		{
		return 'Error';
		}
});



