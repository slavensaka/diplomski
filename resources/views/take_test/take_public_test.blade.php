<?php use Dipl\Question; ?> 
{{-- {{ dd($the_test) }}  --}}
{{-- {{ dd($questions) }} --}}
{{-- {{ var_dump($answers[5]["answer"]) }} --}}
@extends('app')
@section('content')

@foreach($questions as $question) 


<?php
$answers = Question::find($question->id)->answers;
$answer_array =  $answers->toArray();

echo $question->question. '<br/><br/><br/>';

$counting = count($answers);

?>
@for ($i=0; $i <= $counting+1; $i++)
<?php if(isset($answer_array[$i]["answer"])) { 
	$j = 1;
	?>

{!! Form::open(array('route' => array('finished', $question->id),'method' => 'post')) !!}
<ul>
	<li>
		{{-- {!! Form::label('answer',$i) !!} --}}
		{{-- {!! Form::text("answer_form[$i][answer]") !!} --}}
		{!! Form::label($i+1) !!}

		{!! Form::label("answer",$answer_array[$i]["answer"]) !!}
		
		
		{!! Form::radio($answer_array[$i]["answer"][$j]) !!}
	</li>
	<li>
	 {{-- 	{!! Form::label('correct', 'Correct:') !!}
	 	{!! Form::hidden("answer_id_form[$i][answer]") !!}
	   --}}  
	 </li>
</ul>


<?php $j++; } ?>

@endfor
{{-- {!! Form::text("$question->id"  ) !!}	 --}}
{!! Form::label('correct', 'Correct(0 za neodgovor):') !!}
{!!  Form::selectRange("$question->id", 0, $counting); !!}
@endforeach
<br>
{!! Form::submit('Send', array('class' => 'btn btn-info updated_answers')) !!}
{!! Form::close() !!}
@endsection		

	


