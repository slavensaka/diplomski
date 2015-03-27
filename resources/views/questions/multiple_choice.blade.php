@extends('app')
@section('content')
{{-- 
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/one_correct_answer.js') !!}
 --}}
@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Question</h1>
@endif	

{!! link_to_route('answers.show', 'Go Back', $question->id , 
	array('class' => 'btn btn-warning')) !!}

 <?php 
 $answer =  $answers->toArray() ;
 ?>

@for ($i=1; $i <= count($answers); $i++)
	{!! Form::model($answers, array('method' => 'PATCH', 'route' =>array('answers.update',$question->id)), function(){ }) !!}
<ul>
	<li>
		{!! Form::label('answer', 'Answer:') !!}
		{!! Form::text("answer_form[$i][answer]",$answer[$i-1]['answer']) !!}
	</li>
	<li>{{-- 
		{!! Form::hidden($answer[$i-1]['id'], 0, false) !!}
		{!! Form::label($answer[$i-1]['id'], 'Correct:') !!}
	    {!! Form::checkbox($answer[$i-1]['id'], 1, $answer[$i-1]['correct']) !!}
	 --}}
	 	{!! Form::label('correct', 'Correct:') !!}
	 	{!! Form::hidden("answer_id_form[$i][answer]", $answer[$i-1]['id'], false) !!}
		{!! Form::hidden("correct_form[$i][correct]", 0, false) !!}
	    {!! Form::checkbox("correct_form[$i][correct]", 1, $answer[$i-1]['correct']) !!}
	    {!! Form::hidden( 'route' , Route::getCurrentRoute()->getPath(), false ) !!}
	 </li>


</ul>
@endfor
	<li>
		{!! Form::submit('Update This Answers', 
			array('class' => 'btn btn-info updated_answers')) !!}
		{!! link_to_route('answers.show', 'Go Back', $question->id, 
			array('class' => 'btn btn-danger')) !!}
	</li>	
		{!! Form::close() !!}



@endsection		