<?php use Dipl\Question; ?> 
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/functions.js') !!}
{{-- {{ dd($test) }}  --}}
{{-- {{ dd($questions) }} --}}
{{-- {{ dd($student_name) }} --}}
{{-- {{ print_r($answers) }} --}}
 
@extends('app')
@section('content')

@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif

<?php 
$answer = $questions->each(function($question) use($test, $student_name){
		  echo '<p><b>'.($question["question"]).'</b></p>'.'<br>';
		  $answers = Question::find($question->id)->answers;
		  
		  //OVAJ SHUFFLE VALJA JE ZA ANSWERS (Question)
		  if($question->shuffle_question){
		  	$answers->shuffle(); 
		  }
		$answers->each(function($answer) use ($question,$answers,$test, $student_name){
		// echo $answer->question_id;
		// echo $question->id;
	echo Form::open(array('route' => array('testing1',$test->id),'method' => 'post')) ;	 
if($question->type === 'multiple_choice' || $question->type === 'true_false') {
?>
<ul>
	<li>
<?php echo Form::label($answer["answer"],$answer["answer"]); ?>
<?php echo Form::radio($answer->question_id, $answer["answer"]); ?>
<?php echo Form::hidden('student_name', $student_name); ?>
	</li>

</ul>
<?php 
echo "<br>";
 } elseif($question->type === 'multiple_response') {
 echo Form::label($answer["answer"], $answer["answer"]);
 // echo Form::hidden($answer["answer"], "multiple_response");

echo Form::hidden('student_name', $student_name);

echo Form::checkbox($answer["id"],$answer["answer"]); 
// echo Form::selectRange($answer->question_id, 1, count($answers) );

	} else {
		echo Form::text($answer->question_id);
	}

	});
});
?>

<?php
// echo Form::hidden('student_name', $student_name);
echo Form::submit('Send', array('class' => 'btn btn-info updated_answers'));
echo Form::close() ;

?>

@endsection		

	


