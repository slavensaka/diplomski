<?php namespace Dipl\Http\Controllers;

use DB;
use App;
use Input;
use Route;
use Session;
use Redirect;
use Response;
use Dipl\Test;
use Dipl\Answer;
use Dipl\Question;
use Dipl\Http\Requests;
use Illuminate\Http\Request;
use Dipl\Support\HelperFunctions;
use Illuminate\Support\Collection;
use Dipl\Http\Controllers\Controller;

class AnswerController extends Controller {

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
        $answers = Question::find($quest_id)->answers;
        
        return view('answers/create')
        ->with(['type' => $type, 'quest' => $quest, 'answers' => $answers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // dd(Input::all());
        $question = DB::table('questions')
        ->where('id','=',Input::get('quest_id'))->select('type')->first();
        
     $answers = DB::table('anwsers')->where('question_id', '=', Input::get('quest_id'))
     ->where('correct', '=', 1)->sum('correct');
        $new_answer = Input::get("correct");
        $answers += (int)$new_answer;
        
    //Check that one true_false if correct, that both are not 0.
    if($question->type === 'true_false' && Input::get("correct") === "0"){
            $count_of_true_false = DB::table('anwsers')
            ->where('question_id',Input::get('quest_id'))
            ->where('correct', '=', 0)->get();
            if(Input::get("correct" === '1')){
                
         }
     }
         //Check that one multiple_choice if correct, that both are not 0.            
         // if($question->type === 'multiple_choice') {
         //    $count_of_multiple_choice = DB::table('anwsers')
         //    ->where('question_id',Input::get('quest_id'))
         //    ->where('correct', '=', 0)->get();
         //    // dd(count($count_of_multiple_choice));
         //    if(count($count_of_multiple_choice) >= 1){
         //        Session::put('warning', 'One must be an correct answer');
         //        Session::put('question_id', Input::get('quest_id'));
         //    }
         // }
         // Check that more than one is correct in a multiple_response
        if(!($question->type === 'multiple_response')){    
        if($answers > 1) {
            $question_id = Input::get('quest_id');
            $test_id = Question::find($question_id)->test;
            return Redirect::back()
            ->with('message','Error, more than one is correct.')
            ->with('answer',$new_answer);
        }
       }
            $answer = new Answer;
            $answer->answer = Input::get('answer');
            $answer->correct = Input::get('correct');
            $question_id = Input::get('quest_id');
            $answer->question_id = $question_id;
            $answer->save();
            $answers = DB::table('anwsers')->where('correct','=', 1)//NE TREBA?
            ->where('question_id','=', $answer->question_id)->get();
            $test_id = Question::find($question_id)->test;
            return Redirect::action('QuestionController@show', array($test_id));    
            // DB::table('anwsers')->where('id', Input::get("answer_id_form.$i"))
            //     ->update(array('answer' => current(Input::get("answer_form")[$i]) ,
            //     'correct' => current(Input::get("correct_form")[$i]) ));
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
            $question_test_id = Input::get('question_test_id');
            if(!(Input::get("type") === "multiple_response")){
                $items = array_flatten(Input::get("correct_form"));
                $selected = HelperFunctions::CheckOnlyOneSelected($items);
            if(!('Success' === $selected)){
            	return Redirect::back()->with('message',$selected);
           // return Redirect::action('QuestionController@show', 
           //          array($question_test_id))->with('message',$selected);
           	} else {
            $count = count(Input::get('answer_id_form'));
            for($i=1; $i <= $count; $i++)
            {
                DB::table('anwsers')->where('id', Input::get("answer_id_form.$i"))
                ->update(array('answer' => current(Input::get("answer_form")[$i]),
                'correct' => current(Input::get("correct_form")[$i]) ));                
            } 
            return Redirect::action('QuestionController@show', 
            array($question_test_id))->with('success','UPDATED ANSWERS');
               } 
        } else { // Is_correct UPDATE SA questions.show
       		 $question = Answer::find($id)->question;
       		 $answers_count = DB::table('anwsers')->where('question_id','=', $question->id)
        	->where('correct','=', 1)->get();       
            // if (count($answers_count) === 0 ) 
            // {    
            //     $input = Input::all();
            //     $question = Answer::find($id)->question;
            //     $answer = Answer::find($id);
            //     $answer->update($input);
            //     return Redirect::action('QuestionController@show', 
            //         array($question->test_id))->with('message','Jedan mora biti točan');

            // } else if (count($answers_count) > 1) 
            // {
            //     $input = Input::all();
            //     $question = Answer::find($id)->question;
            //     $answer = Answer::find($id);
            //     $answer->update($input);
            //     return Redirect::action('QuestionController@show', 
            //         array($question->test_id))->with('message','Nesmije više od jedan bit točan');
            // } else 
            // {
                $input = Input::all();             
                $question = Answer::find($id)->question;
                $answer = Answer::find($id);
                $answer->update($input);
                return Redirect::action('QuestionController@show', 
                    array($question->test_id))->with('message','Sve Uredu, Jedan je točan');
            // }
           }
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) // id answera
    {
        // dd(Input::all());
        // if(Input::get('route') === "questions/{questions}/edit") {
        //     $id =Input::get("answer_id_form");
        //     dd($id);

        //     Answer::find($id)->delete();;
                
        //     return redirect()->back();
        // }    
        Answer::find($id)->delete();
        return redirect()->back();
    }
}
