@extends('app')
@section('content')
@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Create a New Question</h1>
	{!! Form::open(array('route' => 'questions.store', 'files'=> true)) !!}
 	{!! Form::label('question', 'Question') !!}
 	<div>
	{!! Form::textarea('question', Input::old('question'),
		array('required' => "required",'placeholder'=>'Type the question', 
			  'class' => 'field','size' => '50x6')) !!}
    </div>
	<br>{!! Form::label('type', 'Type:') !!}
	<div>	
	{!! Form::select('type', [
   					'multiple_choice' => 'Multiple choice',
		   			'true_false' => 'True false',
			    	'multiple_response' => 'Multiple response',
				    'fill_in' => 'Fill in'], null, ['class' => 'type_select']) !!}
	</div>
	<br>{!! Form::label('points', 'Question points for correct answers: ') !!}
	{!! Form::selectRange('points', 1, 15, 5, ['placeholder'=>'Type points number','required' => "required", 'class' => 'field']) !!}<br><br>
	<div>
		{!! Form::label('points', 'Question Image: ') !!}
		{!! Form::file('question_image') !!}
	</div>
	<br>{!! Form::label('shuffle_question', 'Shuffle question answers:') !!}
	{!! Form::hidden("shuffle_question", 0, false) !!}
	{!! Form::checkbox("shuffle_question", 1, Input::old('shuffle_question')) !!}<br>
	{!! Form::hidden('test_id', $test_id, array('id' => 'question')) !!}
	<br>{!! Form::submit('Send it!',array('class' => 'btn btn-info')) !!}
	{!! Form::close() !!}
@endif
@endsection