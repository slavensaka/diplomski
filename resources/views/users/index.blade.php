@extends('app')

@section('content')


@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Users Tests</h1>
	<p>{!! link_to_route('tests.create', 'Add new test', array() , array('class' => 'btn btn-primary')) !!}</p>
@if ($tests->count())
		<table class="table table-striped table-bordered">
		<thead>
		<tr>
		<th>ID</th>
		<th>Test_name</th>
		<th>Intro</th>
		<th>Conclusion</th>
		<th>user_id</th>
		</tr>
		</thead>
		<tbody>
		@foreach ($tests as $test)
		<tr>
		<td>{{ $test->id }}</td>
		<td>{{ $test->test_name }}</td>
		<td>{{ $test->intro }}</td>
		<td>{{ $test->conclusion }}</td>
		<td>{{ $test->user_id }}</td>
		<td>{!! link_to_route('questions.show', 'Add Questions', array($test->id), array('class' => 'btn btn-danger')) !!}</td>
		<td>
			{!! link_to_route('tests.edit', 'Edit Test', array($test->id), array('class' => 'btn btn-info')) !!}
		</td>
		<td>
		{!! Form::open(array('method'=> 'DELETE', 'route' => array('tests.destroy', $test->id))) !!}
		{!! Form::submit('Delete Test', array('class' => 'btn btn-danger')) !!}
		{!! Form::close() !!}
		</td>
		<td>{!! link_to_route('tests.create', 'PUBLISH', array($test->id), array('class' => 'btn btn-info')) !!}
		</td>
		</tr>
		@endforeach
		</tbody>
		</table>
		@else
		There are no tests
		@endif
		@stop
		@endif

		@endsection