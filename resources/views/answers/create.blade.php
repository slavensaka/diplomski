<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@extends('app')

@section('content')


@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Create a New Answer for Question</h1>



@if($type === 'multiple_choice') 
    	

{{-- {!! dd($quest) !!} --}}
<table class="table table-striped table-bordered">
<thead>

<tr>
<td>Question ID:{!! $quest->id !!}</td>
<td>Question: {!! $quest->question !!}</td>
</tr>

<tr>
<td>Points: {!! $quest->points !!}</td>
<td>Shuffle_question: {!! $quest->shuffle_question !!}</td>
</tr>

<tr>
<td>Type: {!! $quest->type !!}</td>
<td>Test_id: {!! $quest->test_id !!}</td>
</tr>

</thead>
<tbody>


</tbody>
</table>

	{!! Form::open(array('route' => 'answers.store')) !!}

	<br>
	{!! Form::label('answer', 'Answer') !!}
	{!! Form::text('answer',Input::old('answer')) !!}
	<br>
	{!! Form::label('correct', 'correct') !!}
	{!! Form::text('correct', Input::old('correct')) !!}
	<br>
	{!! Form::hidden('quest_id', $quest->id, array('id' => 'quest_id')) !!}

	<br>
	{!! Form::submit('Send it!') !!}
	{!! Form::close() !!}



	@endif
	@endif
	@endsection



<script type="text/javascript">
	
</script>