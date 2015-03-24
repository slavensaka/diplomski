<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link href="/css/app.css" rel="stylesheet">


	<title>AutoGenerate</title>
	<link rel="stylesheet" href="">
</head>
<body>
		<div class="container">
			<div class="content">
				
				<div class="quote">Create automatically graded online tests for free!</div>

			    <p>
			    	{!! link_to('auth/register', 'Register to create tests for FREE', array('class' => 'btn btn-primary')) !!}
			    </p>
			    <p>
			    	{!! link_to('auth/login', 'Admin login', array('class' => 'btn btn-primary')) !!}
			    </p>
			    {{-- <p>
			    	{!! link_to('auth/test_taker', 'Take a test!', array('class' => 'btn btn-primary')) !!}
			    </p> --}}
			    	
<h2> Take a tests that other users already made: </h2>	
				
				<table class="table table-striped table-bordered">
				<thead>
				<tr>
				<th>Tests Creator</th>
				<th>ID</th>
				<th>Test_name</th>
				<th>Intro</th>
				<th>Conclusion</th> 
				<th>Test is Shuffled</th>
				<th>Is_published</th>
				<th>Has Passcode</th>
				<th>user_id</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($users_published_tests as $published_test)
				<tr>
				<td>{{ $published_test->name }}</td>
				<td>{{ $published_test->id }}</td>
				<td>{{ $published_test->test_name }}</td>
				<td>{{ $published_test->intro }}</td>
				<td>{{ $published_test->conclusion }}</td>
				<td>{{ $published_test->shuffle }}</td>
				<td>{{ $published_test->is_published }}</td>
				<td>NULL</td> {{-- Something to be done --}}
				<td>{{ $published_test->user_id }}</td>
				<td>{!! link_to_route('questions.show', 'Take This Test', array($published_test->id), array('class' => 'btn btn-danger')) !!}
				</td>
				{{-- <td>
					{!! link_to_route('tests.edit', 'Edit Test', array($test->id), array('class' => 'btn btn-info')) !!}
				</td>
				<td>
				{!! Form::open(array('method'=> 'DELETE', 'route' => array('tests.destroy', $test->id))) !!}
				{!! Form::submit('Delete Test', array('class' => 'btn btn-danger')) !!}
				{!! Form::close() !!}
				</td>
				<td>{!! link_to_route('tests.create', 'PUBLISH', array($test->id), array('class' => 'btn btn-info')) !!}
				</td>--}}
				</tr>
				@endforeach
				</tbody>
				</table>
				

			</div>

		</div>


</body>
</html>