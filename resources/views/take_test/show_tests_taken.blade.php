@extends('app')
@section('content')


@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
<p>
	{!! link_to_route('tests_taken', 'Go Back To Tests', 
		array(), 
		array('class' => 'btn btn-primary')) !!}
</p>
<h1>Your score on this test was: {!! $test_result !!}</h1>
@if($questions->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Question</th>
				<th>Points</th>
				<th>Shuffle_question</th>
				<th>Type</th>
				<th>Test_id</th>
			</tr>
		</thead>
		<tbody>
		@foreach ($questions as $question)
			<tr class="success">
				<td>{{ $question->id }}</td>
				<td>{{ $question->question }}</td>
				<td>{{ $question->points }}</td>
				<td>{{ $question->shuffle_question }}</td>
				<td>{{ $question->type }}</td>
				<td>{{ $question->test_id }}</td>
			</tr>
			<tr>
				<th>ID</th>
				<th>Answer</th>
				<th>Correct</th>
				<th>Question ID </th>
				
				{{-- <th>Is_Correct</th> --}}
			</tr>
			@foreach ($answers as $tests_answer)
			@if($question->id === $tests_answer->question_id)
			<tr>
				<td>{{ $tests_answer->id }}</td>
				<td>{{ $tests_answer->answer }}</td>
				
				<td>{{ $tests_answer->correct }}</td>
				<td>{{ $tests_answer->question_id }}</td>
</tr>
@endif
@endforeach
			
@endforeach


@else
<h2>There are no questions questions for this test</h2>
<p>
	{!! link_to_route('tests', 'Go Back To Tests', 
		array(Auth::user()->name), 
		array('class' => 'btn btn-primary')) !!}
</p>


@endif

@stop


@endsection