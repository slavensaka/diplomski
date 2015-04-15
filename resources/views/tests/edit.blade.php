@extends('app')
@section('content')

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Edit a Test</h1>
	{!! Form::model($test, array('method' => 'PATCH', 
	  	'route' =>array('tests.update', $test->id))) !!}
	<ul>
		<li>
			{!! Form::label('test_name', 'Test name:') !!}
			{!! Form::text('test_name',Input::old('test_name')) !!}		            	            
		</li>
		<li>
			{!! Form::label('intro', 'Test Intro message:') !!}
		</li>
		<li>
			{!! Form::textarea('intro', Input::old('intro'), 
			['placeholder'=>'Type the intro', 'class' => 'field','size' => '30x5']) !!}
		</li>
		<li>
			{!! Form::label('conclusion', 'Test conclusion message:') !!}
		</li>
		<li>
			{!! Form::textarea('conclusion', Input::old('conclusion'), 
			['placeholder'=>'Type the conclusion', 'class' => 'field','size' => '30x5']) !!}
		</li>
		<li>
			{!! Form::label('shuffle', 'Shuffle test questions:') !!}
			{!! Form::hidden("shuffle", 0, false) !!}
			{!! Form::checkbox("shuffle", 1, Input::old('shuffle')) !!}

		</li>

		<li>
			{!! Form::label('passcode', 'Update passcode:') !!}
			{!! Form::password('passcode',array('placeholder' => 'Update Passcode'),
			Input::old('passcode')) !!}
			{{-- {!! Form::text('passcode', NULL, array('placeholder'=>'Type the passcode')) !!} --}}
			{{-- {!! Form::input('passcode', null,null) !!} --}}
		</li>
		<li>
			<p>If you leave passcode blank, password wont change.</p>
		</li>
		<li>
			<p>To remove the passcode, consider making the test 
				public on your <a href="{{ URL::previous() }}">control panel</a>
			</p>
		</li>
		<li>
			{!! Form::submit('Update', array('class' => 'btn btn-info')) !!}
			<a href="{{ URL::previous() }}">Go Back</a>
		</li>
	</ul>
	{!! Form::close() !!}

@endif
@endsection		