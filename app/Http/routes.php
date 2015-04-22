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
        'tests.user_id', 'tests.is_published','tests.is_public',
        'tests.intro_image', 'tests.conclusion_image')
    ->get();
    return view('welcome')->with('users_published_tests', $users_published_tests);
});

Route::get('tests', array('as' => 'tests', 'middleware' => 'auth', 'uses' => 'TestController'));
Route::get('answers', array('as' => 'answer', 'middleware' => 'auth', 'uses' => 'AnswerController'));

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

Route::get('tests_taken', ['as' => 'tests_taken', 'uses' => 'PublishController@tests_taken']);

Route::get('students', ['as' => 'students', 'uses' => 'PublishController@your_students']);

Route::delete('tests_taken/{test_id}', ['as' => 'delete_taken_test', 'uses' => 'PublishController@delete_taken_test']);

Route::get('copy_test/{test_id}', ['as' => 'copy_public_test', 'uses' => 'PublishController@copy_public_test']);

Route::get('show_tests_taken/{test_id}', ['as' => 'show_tests_taken', 'uses' => 'PublishController@show_tests_taken']);

Route::get('student_login', ['as' => 'student_login', 'uses' => 'StudentController@student_login']);

Route::get('student_register', ['as' => 'student_register', 'uses' => 'StudentController@student_register']);

Route::post('student_register_form', ['as' => 'student_register_form', 'uses' => 'StudentController@student_register_form']);

Route::get('student_logout', ['as' => 'student_logout', 'uses' => 'StudentController@student_logout']);

Route::post('student_login_verify', ['as' => 'student_login_verify', 'uses' => 'StudentController@student_login_verify']);

Route::post('control_panel', ['as' => 'control_panel', 'uses' => 'StudentController@control_panel']);

Route::get('control_panel', ['as' => 'control_panel', 'uses' => 'StudentController@control_panel']);

Route::get('intro_image_delete', ['as' => 'intro_image_delete', 'uses' => 'TestController@intro_image_delete']);

Route::get('conclusion_image_delete', ['as' => 'conclusion_image_delete', 'uses' => 'TestController@conclusion_image_delete']);

Route::get('question_image_delete', ['as' => 'question_image_delete', 'uses' => 'QuestionController@question_image_delete']);

Route::post('preferences/{name?}', ['as' => 'preferences', 'uses' => 'UserController@preferences']);

Route::post('delete_user', ['as' => 'delete_user', 'uses' => 'UserController@delete_user']);




