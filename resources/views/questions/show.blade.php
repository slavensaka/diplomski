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
<td>{!! link_to_route('answers.create', 'Add new Answer', array($question,$answers) , array('class' => 'btn btn-info')) !!}</td>

<td>{!! link_to_route('questions.edit', 'Edit Question', array($question->id), array('class' => 'btn btn-info')) !!}</td>
<td>
	{!! Form::open(array('method'=> 'DELETE', 'route' => array('questions.destroy', $question->id))) !!}
	{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}
</td>
</tr>
<tr>
<th>ID</th>
<th>Answer</th>
<th>Correct</th>
<th>Question_id</th>
</tr>

@foreach ($answers as $tests_answer)
@if($question->id === $tests_answer->question_id)
<tr class="warning">
<td>{{ $tests_answer->id }}</td>
<td>{{ $tests_answer->answer }}</td>
<td>{{ $tests_answer->correct }}</td>
<td>{{ $tests_answer->question_id }}</td>
<td>{!! link_to_route('questions.edit', 'Edit Answer', array($question->id), array('class' => 'btn btn-info')) !!}</td>
<td>
	{!! Form::open(array('method'=> 'DELETE', 'route' => array('answers.destroy', $tests_answer->id))) !!}
	{!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
	{!! Form::close() !!}
</td>



@endif
@endforeach

</tr>

@endforeach

<p>{!! link_to_route('questions.create', 'Add new question', array($question->test_id) , array('class' => 'btn btn-primary')) !!}</p>





</tbody>
</table>
@else
There are no questions for this test. Create


<p>{!! link_to_route('questions.create', 'Add new question', array() , array('class' => 'btn btn-primary')) !!}</p>
@endif










@stop

@endif




@endsection