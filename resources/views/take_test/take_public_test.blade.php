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
		$answers = Question::find($question->id)->answers;
		// dd($answers);
		echo "<h2>$question->question</h2>";
		echo '<br>';
		$answers = Question::find($question->id)->answers;
		if($question->type ==='multiple_choice') {
	    $answer =  $answers->toArray();
	    $counting = count($answers);
	   // dd($answer);   
?>
	{!!  Form::open(array('route' => array('finished', $question->id), 
		'method' => 'post')) !!}
 <ul>
	 <li>	
	 </li>
		@for ($i=1,$j=1; $i <= $counting; $i++,$j++)
		{{-- @for ($i=1; $i <= 4; $i++) --}}
		{!! Form::label('answer', $answer[$i-1]["answer"] ) !!}
		{{-- {!! Form::hidden("answer_form[$i]", $answer[$i-1]["answer"] ) !!} --}}
		{!! Form::hidden("correct_form[$i][correct]", 0, false) !!}
	    {!! Form::radio("correct_form[$i][correct]", 1) !!}
	    @endfor
 </ul>

<?php  } else if($question->type ==='multiple_response'){

	} else 'Lorem'; ?>	
	{!!  Form::open(array('route' => array('finished', $question->id), 
		'method' => 'post')) !!}
		{!! Form::label('answer', 'TESTING') !!}
@endforeach
		{!! Form::submit('Finish Test', 
			array('class' => 'btn btn-info updated_answers')) !!}
		{!! link_to_route('/', 'Go Back', 
			array($question->id) , 
			array('class' => 'btn btn-danger')) !!}
		{!! Form::close() !!}
@endsection		

	


