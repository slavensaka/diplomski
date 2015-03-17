<?php use Dipl\Answer; ?>

@extends('app')

@section('content')

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Question</h1>
@endif	

@if($question->type === 'fill_in') 

	{!! Form::model($question, array('method' => 'PATCH', 'route' =>array('questions.update', $question->id)), function(){       }) !!}
<ul>
	<li>
		{!! Form::label('question', 'Question:') !!}
		{!! Form::text('question') !!}		            	            

	</li>
	<li>
		{!! Form::label('points', 'Points:') !!}
		{!! Form::text('points') !!}
	
	</li>
	<li>
		{!! Form::label('shuffle_question', 'shuffle_question:') !!}
		{!! Form::text('shuffle_question') !!}
	</li>
	<li>
		{!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
		{!! link_to_route('questions.show', 'Cancel', $question->id,array('class' => 'btn')) !!}
	</li>
	</ul>
		{!! Form::close() !!}


	<h1>Edit answers</h1>

	{!! Form::model($answers, array('method' => 'PATCH', 'route' =>array('answers.update')), function(){       }) !!}
<ul>
	@foreach ($answers as $answer)
    {!! $answer->id !!}
   
    <?php $answers = Answer::find($answer->id)  ?>

  		
	<li>
		{!! Form::label('answer', 'Answer:') !!}
		{!! Form::text('answer', $answers->answer) !!}		            	            

	</li>
	<li>
		{!! Form::label('correct', 'Correct:') !!}
		{!! Form::text( 'correct',$answers->correct) !!}
	
	</li>
@endforeach	
	<li>
		{!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
		{!! link_to_route('answers.show', 'Cancel', array('class' => 'btn')) !!}
	</li>
	

	</ul>
		{!! Form::close() !!}


 @else {{ 'Noki' }}


@endif

@endsection		