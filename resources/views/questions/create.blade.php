@extends('app')
@section('content')

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Create a New Question</h1>
	
	{{  'Test_id: ' }}{!!  $question_test_id !!}
	{!! Form::open(array('route' => 'questions.store')) !!}
 	{!! Form::label('question', 'Question') !!}
	{!! Form::text('question', Input::old('question'),
		array('required' => "required",'placeholder'=>'Type the question')) !!}
	<br>
		{!! Form::label('type', 'Type:') !!}
	{!! Form::select('type', [
   					'multiple_choice' => 'Multiple choice',
		   			'true_false' => 'True false',
			    	'multiple_response' => 'Multiple response',
				    'fill_in' => 'Fill in'], null, ['class' => 'type_select']) !!}
	<br>
	{!! Form::label('points', 'points') !!}
	{!! Form::text('points', Input::old('points'),
		array('required' => "required",'placeholder'=>'Type points number')) !!}
	<br>
	{!! Form::label('shuffle_question', 'Shuffle question answers:') !!}
	{!! Form::hidden("shuffle_question", 0, false) !!}
	{!! Form::checkbox("shuffle_question", 1, Input::old('shuffle_question')) !!}
	<br>

	
	{!! Form::hidden('test_id', $question_test_id, array('id' => 'question')) !!}
	<br>
	{!! Form::submit('Send it!') !!}
	{!! Form::close() !!}

@endif
@endsection