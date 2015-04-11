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

Route::get('/', array('as' => '/','uses' => 'WelcomeController@index'));

Route::get('home', 'HomeController@index');


Route::get('homepage', function()
{
   $users_published_tests =DB::table('users')
    ->join('tests', 'users.id', '=', 'tests.user_id')
    ->where('is_published','=', 1)
    ->select('users.name', 'tests.id', 'tests.test_name',
        'tests.intro', 'tests.conclusion', 'tests.shuffle',
        'tests.user_id', 'tests.is_published','tests.is_public')->get();
    return view('welcome')->with('users_published_tests', $users_published_tests);
});

Route::get('tests', array('as' => 'tests','uses' => 'TestController'));
Route::get('answers', array('as' => 'answer','uses' => 'AnswerController'));

Route::controllers(['auth' => 'Auth\AuthController',
'password' => 'Auth\PasswordController',]);

Route::resource('users', 'UserController');
Route::resource('tests', 'TestController');
Route::resource('answers', 'AnswerController');
Route::resource('questions','QuestionController');

Route::get('publish', ['as' => 'publish', 'uses' => 'PublishController@publish']);
Route::get('unpublish', ['as' => 'unpublish', 'uses' => 'PublishController@unpublish']);

Route::get('is_public', ['as' => 'is_public', 'uses' => 'PublishController@is_public']);
Route::get('is_private', ['as' => 'is_private', 'uses' => 'PublishController@is_private']);

Route::get('take/{test}', ['as' => 'take_test', 'uses' => 'PublishController@take_test']);
Route::get('private/{test}', ['as' => 'private', 'uses' => 'PublishController@private']);
Route::post('take_private_test/{test}', ['as' => 'take_private_test', 'uses' => 'PublishController@take_private_test']);

Route::post('finished/{id}', ['as' => 'finished', 'uses' => 'PublishController@finished']);

Route::post('testing1/{id}', ['as' => 'testing1', 'uses' => 'PublishController@testing1']);

Route::get('result/{test_id}', ['as' => 'result', 'uses' => 'PublishController@result']);

Route::get('tests_taken', ['as' => 'tests_taken', 'uses' => 'PublishController@tests_taken']);

Route::delete('tests_taken/{test_id}', ['as' => 'delete_taken_test', 'uses' => 'PublishController@delete_taken_test']);

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



