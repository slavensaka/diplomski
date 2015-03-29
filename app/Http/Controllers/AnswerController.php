<?php namespace Dipl\Http\Controllers;

use DB;
use App;
use Input;
use Route;
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
       
     $answers = DB::table('anwsers')->where('question_id', '=', Input::get('quest_id'))
     ->where('correct', '=', 1)->sum('correct');
        $new_answer = Input::get("correct");
        $answers += (int)$new_answer;
        if($answers > 1) {
            
            $question_id = Input::get('quest_id');
            $test_id = Question::find($question_id)->test;
            return Redirect::back()->with('message','Nije Spremljeno, 
                imate više od jedan kao točan. ISPRAVITE');
        }
        
            $answer = new Answer;
            $answer->answer = Input::get('answer');
            $answer->correct = Input::get('correct');
            $question_id = Input::get('quest_id');
            $answer->question_id = $question_id;
            $answer->save();
            $answers = DB::table('anwsers')->where('correct','=', 1)
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

            $items = array_flatten(Input::get("correct_form"));
                        
            $selected = HelperFunctions::CheckOnlyOneSelected($items);

            if(!('Spremljeno' === $selected)){
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

/**
 * 
 */

   

}
