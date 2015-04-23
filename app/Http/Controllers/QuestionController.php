<?php namespace Dipl\Http\Controllers;

use DB;
use Auth;
use File;
use Input;
use Route;
use Config;
use Request;
use Redirect;
use Dipl\Test;
use Validator;
use Dipl\User;
use Dipl\Answer;
use Carbon\Carbon;
use Dipl\Question;
use Dipl\Http\Requests;
use Dipl\Support\HelperFunctions;
use Dipl\Http\Controllers\Controller;

class QuestionController extends Controller {

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
		if(!Auth::check())
		{
			return redirect()->guest('auth/login');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// dd(Input::all());
			$test_id = Input::get("test_id");
		// dd($test_id);
		// $question = Input::all();
		// if(count($question)){
		//  foreach($question as $key => $value){
	 //  			$question_test_id = $key;
		// }		
		// return view('questions/create')->with('question_test_id', $question_test_id);
		// } else {
			// $user_id = Auth::user()->id;
			// $tests = User::find($user_id)->tests;
			// $question_test_id = $tests->last()->id;
			return view('questions/create')->with('test_id', $test_id);
		// }
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	
	
	public function store()
	{


		$validation = Validator::make(Input::all(), Question::$question_image_upload_rules);

		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		} else {

			if(Input::file('question_image')){
				$question_fullname = HelperFunctions::question_get_slug_upload_make_image(
					Input::file('question_image'));

				$question = new Question;
				$question->test_id = Input::get('test_id');
				$question->question = Input::get('question');
				$question->points = Input::get('points');
				$question->shuffle_question = Input::get('shuffle_question');
				$question->question_image = $question_fullname;
				$question->type = Input::get('type');
				$question->created_at = Carbon::now();
				$question->updated_at = Carbon::now()->addMinutes(2);
				$question->save();

				$last_question_id = DB::getPdo()->lastInsertId();
				$test_id = Question::find($last_question_id)->test;
	        } else {
				$question = new Question;
				$question->test_id = Input::get('test_id');
				$question->question = Input::get('question');
				$question->points = Input::get('points');
				$question->shuffle_question = Input::get('shuffle_question');
				$question->type = Input::get('type');
				$question->created_at = Carbon::now();
				$question->updated_at = Carbon::now()->addMinutes(2);
				$question->save();

				$last_question_id = DB::getPdo()->lastInsertId();
				$test_id = Question::find($last_question_id)->test;
			}
			return Redirect::action('QuestionController@show', array($test_id));
			
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id) // TEST ID
	{
		// dd($id);
		$questions = Test::find($id)->questions()->paginate(5);
		$answers = Test::find($id)->answers;
		return view('questions.show', compact('questions','answers'))->with("test_id",$id);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$question = Question::find($id);
		$answers = Question::find($id)->answers;

		if($question->type === 'multiple_choice') {
			 return view('questions.multiple_choice',compact('question','answers'));	
		} else if ($question->type === 'true_false'){
			return view('questions.true_false',compact('question','answers'));
		} else if($question->type === 'multiple_response') {
			return view('questions.multiple_response',compact('question','answers'));
		} else { // 'fill_in'
			return view('questions.fill_in',compact('question','answers'));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		

		$validation = Validator::make(Input::all(), Question::$question_image_upload_rules);
		if($validation->fails()){
			return Redirect::back()->withInput()->withErrors($validation);
		} else {

			if(Input::file('question_image')){
				$question_fullname = HelperFunctions::update_question_upload_make_image(
					Input::file('question_image'),$id);
				$updated_at = Carbon::now();
				DB::table('questions')->where('id', $id)
				->update(array(
					'question' => Input::get('question'), 
					'points' => Input::get('points'),
					'question_image' => $question_fullname, 
					'shuffle_question' => Input::get('shuffle_question'),
					'updated_at' => $updated_at 
					));
			} else {
				$updated_at = Carbon::now();
				DB::table('questions')->where('id', $id)
				->update(array(
					'question' => Input::get('question'), 
					'points' => Input::get('points'),
					'shuffle_question' => Input::get('shuffle_question'),
					'updated_at' => $updated_at 
					));
			}
		return Redirect::back()
		->with('message', 'QUESTION UPDATED');

		//OVA FUNKCIONALNOST; ZA UI
		// $last_question_id = Input::get('last_question_id');
		// $test_id = Question::find($last_question_id)->test;
		// return Redirect::action('QuestionController@show', array($test_id));
	}
}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Question::find($id)->delete();
		return redirect()->back();
	}

	public function question_image_delete() {
		// dd(Input::get("question_image"));
		File::delete(Config::get('question_images.upload_folder').'/'.Input::get("question_image"));
        File::delete(Config::get('question_images.thumb_folder').'/'.Input::get("question_image"));

        DB::table('questions')->where('question_image', '=', Input::get("question_image"))
        ->update(array("question_image"=> ""));
    
		return Redirect::back()->with("question_image_message","Question Image Successfully deleted");
	}

}
