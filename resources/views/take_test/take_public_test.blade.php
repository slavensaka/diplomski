<?php use Dipl\Question; ?> 
{{-- {{ dd($the_test) }}  --}}
{{-- {{ dd($questions) }} --}}
@extends('app')
@section('content')
{{-- 
{!! 
	$answers;
	$questions->each(function($question)
	{	
		echo "<h2>$question->question</h2>";
		echo '<br>';
		$answers = Question::find($question->id)->answers;
		
	});	

 	
!!} --}}	

@foreach($questions as $question) 
<?php  
// echo $question->question;
// 	echo $answers = Question::find($question->id)->answers;
	
	
		echo "<h2>$question->question</h2>";
		echo '<br>';
		$answers = Question::find($question->id)->answers;
?>
@foreach($answers as $answer) 
<?php

	echo $answer->answer;
	echo '<br>';

?>
@endforeach

	
	
		
	

@endforeach





@endsection		