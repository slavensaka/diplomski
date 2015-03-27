<?php namespace Dipl\Http\Controllers;

use DB;
use App;
use Dipl\Test;

use Input;
use Route;
use Redirect;
use Response;
use Dipl\Answer;
use Dipl\Question;
use Dipl\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Dipl\Http\Controllers\Controller;

class AnswerController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$type = Input::get('type');
		$quest_id = Input::get('quest_id');
		$quest = DB::table('questions')->where('id', $quest_id)->first();
		return view('answers/create')->with(['type' => $type, 'quest' => $quest]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$answer = new Answer;
		$answer->answer = Input::get('answer');
		$answer->correct = Input::get('correct');
		$question_id = Input::get('quest_id');
		$answer->question_id = $question_id;
		$answer->save();
		$answers = DB::table('anwsers')->where('correct','=', 1)
		->where('question_id','=', $answer->question_id)->get();
   		if (count($answers) === 1) {
   			return 'Ima jedan';
   		} else {
   			return 'Ima više';
   		}
		$test_id = Question::find($question_id)->test;
		return Redirect::action('QuestionController@show', array($test_id));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$quest = Question::find($id)->test;
		return Redirect::action('QuestionController@show', array($quest));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id) // id questiona
	{	
		// dd(Input::all());
 

		if(Input::get('route') === "questions/{questions}/edit") {

			$count = count(Input::get('answer_id_form'));

			for($i=1; $i <= $count; $i++){

					  DB::table('anwsers')->where('id', Input::get("answer_id_form.$i"))
						->update(array('answer' => current(Input::get("answer_form")[$i]) ,
						'correct' => current(Input::get("correct_form")[$i]) ));

				

				 //  $new = DB::table('anwsers')->where('id' , '=', 
					// Input::get("answer_id_form.$i"))->get();
			
				} 
				

			// foreach(Answer::get())Input::get("answer_id_form.$i" as $ans)
			// {
				// $roles = DB::table('anwsers')->lists('answer');
				// $roles=DB::table('anwsers')->lists('answer')
				// ->where('id' , '=', Input::get("answer_id_form.$i"));
				// $users = DB::table('anwsers')->select('answer', 'correct')
				// ->where('id' , '=', Input::get("answer_id_form.$i"))->get();
				// dd($users);
			// }
				// dd($)
				// $answers = Answer::find(Input::get("answer_id_form.$i"));
				// dd($answers);
				// DB::table('anwsers')->where('id' , '=', Input::get("answer_id_form.$i"))
				// ->update(array('answer' => Input::get("answer_form.$i")
				// 	// 'correct' => Input::get("correct_form.$i")
				 // ));

				 // $update = Answer::where('id' , '=', Input::get("answer_id_form.$i"))->get();	
				
				 // $update->correct = Input::get("correct_form.$i");
				 // $update->update();
				

		
				
		// 	$passcode = Hash::make(Input::get('passcode'));
		// $updated_at = Carbon::now();
		// DB::table('tests')->where('id', $id)->update(array(
		// 	'test_name' => Input::get('test_name'), 'intro' => Input::get('intro'),
		// 	'conclusion' => Input::get('conclusion'), 'shuffle' => Input::get('shuffle'),
		// 	'passcode' => $passcode, 'updated_at' => $updated_at
		// 	));
		// return Redirect::route('tests.index', $id);
			


			// foreach ($_POST['sort'] as $id => $parent)
			// {
  	// 			Answer::where('id','=', $id)->update(array(
  	// 				'position' => $i,'header' => 0,'parent' => $parent));
  	// 		}






		} else {
			
		
		// $answer = DB::table('anwsers')->where('id','=',$id)->get();
		
		// dd($question->id);
		// $questions = Test::find($question->test_id)->questions;
		// $answers = Question::find($question->id)->answers;
		$question = Answer::find($id)->question;
		$answers_count = DB::table('anwsers')->where('question_id','=', $question->id)
		->where('correct','=', 1)->get();
		
			if (count($answers_count) === 0 ) 
			{	
				$input = Input::all();
				$question = Answer::find($id)->question;
				$answer = Answer::find($id);
				$answer->update($input);
				return Redirect::action('QuestionController@show', 
					array($question->test_id))->with('message','Jedan mora biti točan');

			} else if (count($answers_count) > 1) 
			{
				$input = Input::all();
				$question = Answer::find($id)->question;
				$answer = Answer::find($id);
				$answer->update($input);
				return Redirect::action('QuestionController@show', 
					array($question->test_id))->with('message','Nesmije više od jedan bit točan');
			} else 
			{
				$input = Input::all();
				$question = Answer::find($id)->question;
				$answer = Answer::find($id);
				$answer->update($input);
				return Redirect::action('QuestionController@show', 
					array($question->test_id))->with('message','Sve Uredu, Jedan je točan');
			}

						
		
			}

				
						// return Redirect::back()->with('message','Ima već jedan točan');
					// } elseif(count($answers) === 0){
						
						
					// } elseif(count($answers) > 1) {
						// return Redirect::back()->with('message','Samo jedan mora biti točan');
					// }


					
	

		// $answer_id = array_keys($collection);
		// $real_answer = Answer::find($answer_id[3]);

		// $answer_id = DB::table('anwsers')->where('question_id', $id)->first();
		
		// $answer = Answer::find($answer_id->id);

		// $answer->answer = Input::get('answer');
		// $answer->save();

		

   // 		if (count($answers) === 1) {
	  //  		$answer_id = array_keys($collection);
			// $real_answer = Answer::find($answer_id[3]);
			// $second = array_slice($collection, 3, 1);
			// $correct = $second[0][0];
			// $answer = Input::get('answer');
			// $correct = $correct;
			// $real_answer->update(['answer' => $answer, 'correct' => $correct ]);
			// $question = Answer::find($id)->question;
			// $test = Question::find($question->test_id)->test;
			// return Redirect::back();
   // 		} else {
   // 			return 'Ima više';
   // 		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Answer::find($id)->delete();
		return redirect()->back();
	}

	

}
