<?php use Dipl\Question; ?> 
{{-- {{ dd($the_test) }}  --}}
{{-- {{ dd($questions) }} --}}
{{-- {{ print_r($answers) }} --}}

@extends('app')
@section('content')
<?php 
$answer = $questions->each(function($question){
		echo ($question["question"]).'<br>';
		 $answers = (Question::find($question->id)->answers);

		 // $answers->collapse();
		 // dd($answers);

	$answers->each(function($answer) use ($question){
		echo $answer->question_id;
		echo $question->id;
echo Form::open(array('route' => array('finished'),'method' => 'post')) ;	
echo "<br>";	
// echo Form::label($answer,$answer) ;
echo Form::label($answer["answer"],$answer["answer"]);

echo "<br>";
echo Form::radio($answer->question_id, $answer["answer"]);

// echo Form::select($answer["answer"],pull($answer)); 	
// Form::selectRange("$question->id", 0, $counting) 
// echo Form::checkbox($answer["answer"], );
// echo Form::text($answer["answer"]);

echo "<br>";
	});
});
echo Form::submit('Send', array('class' => 'btn btn-info updated_answers'));
echo Form::close() ;
?>




@endsection		

	


