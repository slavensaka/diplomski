{{-- {!! dd($correct_points) !!} --}}
{{-- {!! dd($student_name) !!} --}}
{{-- {!! dd($points_count) !!} --}}
{{-- {!! dd($test) !!} --}}
{{-- {!! dd($questions) !!} --}}
{{-- {!! dd($answers) !!} --}}

@extends('app')
@section('content')

@if(Session::has('message'))
{!! Session::get('message'); !!}
@endif
{{-- <p>
	{!! link_to_route('tests_taken', 'Go Back To Tests', 
		array(), 
		array('class' => 'btn btn-primary')) !!}
</p> --}}

<div class="conclusion_image">
{!! Html::image("test_uploads/$test->conclusion_image",
				$test->conclusion_image, array("class"=>"thumb")) !!}
</div>

<h1>Conclusion: {!! $test->conclusion !!}</h1>
<h1>Your score on this test was: {!!  $points_count !!}</h1>
@if(Auth::check())
<h1>Test taker: {!!  Auth::user()->name !!}</h1>
@else
<h1>Test taker: {!!  $student_name !!}</h1>
<h4>Consider login in as a <a href="../student_login">STUDENT HERE</a>
, we already made you an account!</h4>

<h4>Or <b>create your own tests</b> by 
	<a href="/auth/register">REGISTERING HERE</a> for free.</h4>
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
			</tr>
			<tr>
				<th>ID</th>
				<th>Answer</th>
				<th>Correct</th>
				<th>Question ID </th>
				
				{{-- <th>Is_Correct</th> --}}
			</tr>
			<?php
			// dd($correct_points);
		// 	foreach($answers as $key => $answer) {
		// 	// $result ="";
		// 	// $result .= strtolower($answer->answer);
		// 		$ans= $answer->toArray();
				
		// 	if(in_array($correct_points,$ans)) {
				
		// 		// dd($correct_points);
				
		// 	}
		// }
?>			
			
			@foreach ($answers as $key => $tests_answer)

			@if($question->id === $tests_answer->question_id)

 			{{-- @foreach($correct_points as $k => $correct_point) --}}
				@foreach($correct_points as $k => $correct_ponint)
				<?php  $correct= $correct_points[$k]->toArray(); ?>
				
				@if(($correct_points[$k]["answer"] === $tests_answer->answer) && $correct_points[$k]["id"] === $tests_answer->id )

				<tr class="danger">
				<td><b>You answered Correctly</b> </td>
				<td><b>{{ $tests_answer->answer }}</b></td>
			</tr>
				

				@endif 

				@endforeach

				
			<tr>
			
				<td>{{ $tests_answer->id }}</td>
				<td>{{ $tests_answer->answer }}</td>
				
				<td>{{ $tests_answer->correct }}</td>
				<td>{{ $tests_answer->question_id }}</td>
			</tr>
			
			{{-- @endif --}}
			{{-- @endif --}}


@endif




 @endforeach {{-- $answers--}}
@endforeach {{-- $questions --}}

 <div><a class="navbar-brand" href="../../homepage">Go Back</a></div>
@else
<h2>There are no questions for this test</h2>
{{-- <p>
	{!! link_to_route('tests', 'Go Back To Tests', 
		array(Auth::user()->name), 
		array('class' => 'btn btn-primary')) !!}
</p> --}}


@endif

@stop


@endsection