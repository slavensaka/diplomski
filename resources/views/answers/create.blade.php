<?php use Dipl\Answer; ?>
@extends('app')

@section('content')
{{-- {!! dd($quest) !!} --}}
{{-- {{ dd($type) }} --}}
{{-- {{ dd($answers) }} --}}
@if (Auth::guest())
	<h1>Your not logged in</h1>
@else
	<h1>Create a New Answer for Question</h1>

{{-- @if($type === 'multiple_choice')  --}}
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
{{-- {{ dd(count($answers)) }} --}}
@foreach($answers as $answer) 
<?php
echo "<h4>Answer $answer->id :</h4>";
echo "Answer: $answer->answer"; echo '<br>';
echo "Correct:$answer->correct"; echo '<br>';
?>
@endforeach

<p>
@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
</p>

@if(!($quest->type === 'true_false' && count($answers) >= 2) )
@if(!($quest->type === 'fill_in' && count($answers) >= 1)) 

	{!! Form::open(array('route' => 'answers.store')) !!}
	<br>
	{!! Form::label('answer', 'Answer') !!}
	{!! Form::text('answer',Input::old('answer')) !!}
	<br>
	
        {!! Form::label('correct', 'Correct:') !!}
        {!! Form::hidden("correct", 0, false) !!}
        {!! Form::checkbox("correct", 1, Input::old('correct')) !!}
        {{-- {!! Form::hidden( 'route' , Route::getCurrentRoute()->getPath(), false ) !!} --}}
        {{-- {!! Form::hidden( 'question_test_id' , $question->test_id, false ) !!} --}}
    <br>
	{!! Form::hidden('quest_id', $quest->id, array('id' => 'quest_id')) !!}
	<br>
	{!! Form::submit('Send it!', array('class' => 'btn btn-success')) !!}
	{!! Form::close() !!}

                
    <br>
   {!! link_to_route('answers.show', 'Go Back', 
                $quest->id, array('class' => 'btn btn-danger')) !!}

@else {{ "Fill in can only have one answer" }}
<br>
  {!! link_to_route('answers.show', 'Go Back', 
                $quest->id, array('class' => 'btn btn-danger')) !!}
@endif
@else {{ "This type 'true false' answers can only have two answers." }}
<br>
  {!! link_to_route('answers.show', 'Go Back', 
                $quest->id, array('class' => 'btn btn-danger')) !!}
@endif
@endif
@endsection