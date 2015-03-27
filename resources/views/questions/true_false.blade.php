

@extends('app')

@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/one_correct_answer.js') !!}
@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Question</h1>
@endif	

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
		{!! Form::submit('Update Question', array('class' => 'btn btn-info')) !!}
		{!! link_to_route('answers.show', 'Go Back', $question->id, array('class' => 'btn btn-danger')) !!}
	</li>
	</ul>
		{!! Form::close() !!}

	<h1>Edit answers</h1>
<h2 id="divCheckbox" style="display: none; color: red;"></h2>

	{!! Form::model($answers, array('method' => 'PATCH', 'route' =>array('answers.update',$question->id)), function(){       }) !!}

	@foreach ($answers as $answer)
    <ul>
		<li>
			{!! Form::label('answer', 'Answer:') !!}
			{!! Form::text( 'answer',$answer->answer) !!}
		</li>
		<li>
			{!! Form::label('correct', 'TRUE:') !!}		    
			{!! Form::radio($answer->id, '1' ) !!}
		</li>
		<li>
			{!! Form::label('correct', 'FALSE:') !!}		    
			{!! Form::radio( $answer->id, '0',true) !!}
		</li>
		<li>
			{!! Form::submit('Update Answer', array('class' => 'btn btn-info updated_answers')) !!}
			{!! link_to_route('answers.show', 'Go Back', $question->id , array('class' => 'btn btn-danger')) !!}
		</li>
		{!! Form::close() !!}
	</ul>

@endforeach	
@endsection