{!! Form::open(array('route' => 'route.name', 'method' => 'POST')) !!}
	<ul>
		<li>
			{!! Form::label('question', 'Question:') !!}
			{!! Form::textarea('question') !!}
		</li>
		<li>
			{!! Form::label('points', 'Points:') !!}
			{!! Form::text('points') !!}
		</li>
		<li>
			{!! Form::label('shuffle_question', 'Shuffle_question:') !!}
			{!! Form::text('shuffle_question') !!}
		</li>
		<li>
			{!! Form::label('type', 'Type:') !!}
			{!! Form::text('type') !!}
		</li>
		<li>
			{!! Form::submit() !!}
		</li>
	</ul>
{!! Form::close() !!}