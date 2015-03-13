@extends('app')

@section('content')

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Test</h1>
	{!! Form::model($test, 
		      array('method' => 'PATCH', 
		            'route' =>array(
		            	            'tests.update', $test->id))) !!}
	<ul>
	<li>
		{!! Form::label('test_name', 'Test name:') !!}
		{!! Form::text('test_name') !!}		            	            

	</li>
	<li>
		{!! Form::label('intro', 'intro:') !!}
		{!! Form::text('intro') !!}
	</li>
	<li>
		{!! Form::label('conclusion', 'conclusion:') !!}
		{!! Form::text('conclusion') !!}
	</li>
	<li>
		{!! Form::label('passcode', 'passcode:') !!}
		{!! Form::text('passcode') !!}
	</li>
	<li>
		{!! Form::label('shuffle', 'shuffle:') !!}
		{!! Form::text('shuffle') !!}
	</li>
	<li>
		{!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
		{!! link_to_route('tests.show', 'Cancel', $test->id,array('class' => 'btn')) !!}
	</li>
	</ul>
		{!! Form::close() !!}

@endif
@endsection		