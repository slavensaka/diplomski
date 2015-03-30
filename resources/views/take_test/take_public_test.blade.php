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
		// echo $question->type;
		if($question->type ==='multiple_choice') {

		
?>
@foreach($answers as $answer) 

{{-- 
	// echo $answer->answer;
	// echo '<br>'; --}}
	{!!  Form::open(array('route' => array('finished', $answer->id))) !!}
<ul>
	<li>
		{!! Form::label('answer', 'Answer:') !!}
		{!! Form::text('answer', $answer->answer) !!}
	</li>
	<li>
		{!! Form::hidden('correct', 0, false) !!}
	    {!! Form::checkbox($answer->id, 1, $answer->correct) !!}
	</li>
	{{-- <li>
		{!! Form::label('correct', 'TRUE:') !!}		    
		{!! Form::radio($answer->id, '1', $answer->correct ) !!}
	</li>
	<li>
		{!! Form::label('correct', 'FALSE:') !!}		    
		{!! Form::radio( $answer->id, '0') !!}
	</li> --}}
	<li>
		{!! Form::submit('Update This Answer', 
			array('class' => 'btn btn-info updated_answers')) !!}
		{!! link_to_route('answers.show', 'Go Back', $question->id, 
			array('class' => 'btn btn-danger')) !!}
	</li>	
		{!! Form::close() !!}
</ul>




@endforeach

<?php 
} else echo 'Nije multiple_choice';
?>	
	
		
	

@endforeach





@endsection		