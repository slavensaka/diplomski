s


@extends('app')
@section('content')

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Users Tests Questions</h1>

@if ($questions->count())

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
<tr>
<td>{{ $question->id }}</td>
<td>{{ $question->question }}</td>
<td>{{ $question->points }}</td>
<td>{{ $question->shuffle_question }}</td>
<td>{{ $question->type }}</td>
<td>{{ $question->test_id }}</td>
<td>{!! link_to_route('questions.edit', 'Edit Question', array($question->id), array('class' => 'btn btn-danger')) !!}</td>


@foreach ($answers as $tests_answer)
@if($question->id === $tests_answer->question_id)
<tr class="warning">
<td>{{ $tests_answer->id }}</td>
<td>{{ $tests_answer->answer }}</td>
<td>{{ $tests_answer->correct }}</td>
<td>{{ $tests_answer->question_id }}</td>
@endif
@endforeach

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