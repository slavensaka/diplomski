@extends('app')
@section('content')

{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/functions.js') !!}

@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Users Tests Questions</h1>
{{-- {!! dd($answers) !!} --}}

@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif

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
				<td>{!! link_to_route('answers.create', 'Add new Answer', 
				       array('type' => $question->type, 'quest_id' => $question), 
				       array('class' => 'btn btn-info')) !!}
				</td>
				<td>
					{!! link_to_route('questions.edit', 'Edit Question and Answers', 
						array($question->id), 
						array('class' => 'btn btn-warning')) !!}
				</td>
			{{-- 	<td>{!! link_to_route('questions.edit', 'Edit Question', 
						array($question->id), 
						array('class' => 'btn btn-info')) !!} --}}
				</td>
				<td>
					{!! Form::open(array('method'=> 'DELETE', 
						'route' => array('questions.destroy', $question->id))) !!}
					{!! Form::submit('Delete Question', array('class' => 'btn btn-danger')) !!}
					{!! Form::close() !!}
				</td>
			</tr>
{{-- 
@if(Session::has('warning') && $question->type === 'multiple_choice' && $question->id == Session::has('question_id'))
<tr class="warning_session">
<td>
{!! Session::pull('warning'); !!}		

</td>
</tr>
@endif
 --}}
			<tr>
				<th>ID</th>
				<th>Answer</th>
				<th>Correct</th>
				<th>Question ID </th>
				<th>Delete Answer</th>
				{{-- <th>Is_Correct</th> --}}
				
				
			</tr>
@foreach ($answers as $tests_answer)
@if($question->id === $tests_answer->question_id)
			<tr class="danger">
				<td>{{ $tests_answer->id }}</td>
				<td>{{ $tests_answer->answer }}</td>
				
				<td>{{ $tests_answer->correct }}</td>
				{{-- <td> --}}
					{{-- {!! Form::hidden('answers',$answers) !!} --}}

					{{-- {!! Form::hidden('questions',$questions) !!} --}}

				{{-- 	{!! Form::open(array('method'=> 'PATCH', 
						'route' => array('answers.update', $tests_answer->id))) !!} 
					{!! Form::hidden('correct', 0, false) !!}
	    			{!! Form::checkbox('correct', 1, $tests_answer->correct) !!} 
					{!! Form::submit('Update', 
						array('class' => 'btn btn-danger')) !!}
					{!! Form::close() !!} --}}
					
	    		{{-- </td> --}}
	    		
				<td>{{ $tests_answer->question_id }}</td>

				<td>
					{!! Form::open(array('method'=> 'DELETE', 
						'route' => array('answers.destroy', $tests_answer->id))) !!}
					{!! Form::submit('Delete Answer', array('class' => 'btn btn-danger')) !!}
					{!! Form::close() !!}
				</td>
				
@endif
@endforeach
				</tr>
@endforeach

<p>
	{!! link_to_route('tests', 'Go Back To Tests', 
		array(Auth::user()->name), 
		array('class' => 'btn btn-primary')) !!}
</p>
<p>
	{!! link_to_route('questions.create', 'Add new question', 
		array($question->test_id), 
		array('class' => 'btn btn-primary')) !!}
</p>

@if(Session::has('success'))
{!! Session::get('success'); !!}
@endif

		</tbody>
		</table>
@else
<h2>There are no questions for this test. Create:</h2>
<p>
	{!! link_to_route('questions.create', 'Add new question', 
		array(), 
		array('class' => 'btn btn-primary')) !!}
</p>

@if(Session::has('success'))
{!! Session::get('success'); !!}
@endif



@endif
@stop
@endif
@endsection