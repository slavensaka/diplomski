<?php use Dipl\Question; ?> 
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/functions.js') !!}
{{-- {{ dd($test) }}  --}}
{{-- {{ dd($questions) }} --}}
{{-- {{ print_r($answers) }} --}}
 
@extends('app')
@section('content')
<?php 
$answer = $questions->each(function($question) use($test){
		  echo '<p><b>'.($question["question"]).'</b></p>'.'<br>';
		  $answers = Question::find($question->id)->answers;
		  $answers->shuffle(); //OVAJ SHUFFLE VALJA JE ZA ANSWERS
		$answers->each(function($answer) use ($question,$answers,$test){
		// echo $answer->question_id;
		// echo $question->id;

echo Form::open(array('route' => array('testing1',$test->id),'method' => 'post')) ;	 
if($question->type === 'multiple_choice' || $question->type === 'true_false') {
?>
<ul>
	<li>
<?php echo Form::label($answer["answer"],$answer["answer"]); ?>
<?php echo Form::radio($answer->question_id, $answer["answer"]); ?>
	</li>

</ul>
<?php 
echo "<br>";
 } elseif($question->type === 'multiple_response') {
 echo Form::label($answer["answer"], $answer["answer"]);
 // echo Form::hidden($answer["answer"], "multiple_response");

// echo Form::hidden($answer["id"], 0, false);
echo Form::checkbox($answer["id"],$answer["answer"]); 
// echo Form::selectRange($answer->question_id, 1, count($answers) );

	} else {
		echo Form::text($answer->question_id);
	}

	});
});
echo Form::submit('Send', array('class' => 'btn btn-info updated_answers'));
echo Form::close() ;

?>

@endsection		

	


