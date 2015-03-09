{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('answer', 'Answer:') !!}
			{!! Form::textarea('answer') !!}
		</li>
		<li>
			{!! Form::label('correct', 'Correct:') !!}
			{!! Form::text('correct') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}