<?php use Dipl\Question; ?> 
{{-- {{ dd($the_test) }}  --}}
{{-- {{ dd($questions) }} --}}
{{-- {{ print_r($answers) }} --}}

@extends('app')
@section('content')

<?php
$answers = $questions->map(function($question){
	return 	$answers = Question::find($question->id)->answers;
})->toArray();
$questions=$questions->all();
// dd($questions[1]->id);
echo'<br><br>';
// dd($answers[1][3]["answer"]);
echo'<br><br>';

?>

@for ($i=0; $i <= count($questions)-1; $i++)
{!! Form::open(array('route' => array('finished'),'method' => 'post')) !!}
<?php 	if($questions[$i]->id === $answers[$i][$i]["question_id"]) {
	 		print_r($questions[$i]->question);
	 		echo "<br><br>";
	 		for($j=0;$j<=count($answers)+1; $j++) { ?>
{!! Form::label($answers[$i][$j]["answer"],$answers[$i][$j]["answer"]) !!}

{{-- {!! Form::hidden($answers[$i][$j]["answer"], 0, false) !!} --}}
{{-- {!! Form::checkbox($answers[$i][$j]["answer"], 1) !!} --}}
	 		
<?php           
	 			echo '<br><br>';
	 		
	 		} ?>
	 		{!! Form::text('correct', '0'); !!}

<?php } 
?>
{!! Form::select($answers[$i][$j-1]["answer"]); !!}

{!! Form::submit('Send', array('class' => 'btn btn-info updated_answers')) !!}
{!! Form::close() !!}
@endfor



@endsection		

	


