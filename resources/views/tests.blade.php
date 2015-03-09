{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('test_name', 'Test_name:') !!}
			{!! Form::text('test_name') !!}
		</li>
		<li>
			{!! Form::label('intro', 'Intro:') !!}
			{!! Form::text('intro') !!}
		</li>
		<li>
			{!! Form::label('conclusion', 'Conclusion:') !!}
			{!! Form::textarea('conclusion') !!}
		</li>
		<li>
			{!! Form::label('passcode', 'Passcode:') !!}
			{!! Form::text('passcode') !!}
		</li>
		<li>
			{!! Form::label('shuffle', 'Shuffle:') !!}
			{!! Form::text('shuffle') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}