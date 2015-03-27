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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('tests', array('as' => 'tests','uses' => 'TestController'));
Route::get('answers', array('as' => 'answer','uses' => 'AnswerController'));

Route::controllers(['auth' => 'Auth\AuthController',
'password' => 'Auth\PasswordController',]);

Route::resource('users', 'UserController');
Route::resource('tests', 'TestController');
Route::resource('answers', 'AnswerController');
Route::resource('questions','QuestionController');

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



