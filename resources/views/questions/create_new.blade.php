@extends('app')

@section('content')


@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Create a New Question</h1>
	
	
	{!! Form::open(array('route' => 'questions.store')) !!}
 	{!! Form::label('question', 'Question') !!}
	{!! Form::text('question', Input::old('question')) !!}
	<br>
	{!! Form::label('points', 'points') !!}
	{!! Form::text('points', Input::old('points')) !!}
	<br>
	{!! Form::label('shuffle_question', 'shuffle_question') !!}
	{!! Form::text('shuffle_question', Input::old('shuffle_question')) !!}
	<br>
	{!! Form::label('type', 'type') !!}
	{{-- {!! Form::text('type', Input::old('type')) !!} --}}
	{!! Form::select('type', [
   					'multiple_choice' => 'multiple_choice',
		   			'true_false' => 'true_false',
			    	'multiple_response' => 'multiple_response',
				    'fill_in' => 'fill_in'], null, ['class' => 'type_select']) !!}
	<br>
	{{-- {!! Form::label('test_id', 'test_id') !!} --}}
	{{-- {!! Form::hidden('test_id', $question_test_id, array('id' => 'question')) !!} --}}
	{{-- {{ Form::hidden('test_id', ) }} --}}
	{{-- <br> --}}
	
	<br>
	{!! Form::submit('Send it!') !!}
	{!! Form::close() !!}
	@endif
	@endsection