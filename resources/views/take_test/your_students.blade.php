@extends('app')
@section('content')
{{-- {!! dd($your_students) !!} --}}


@if(count($your_students))

<h4>This are your students who took your tests</h4>


<table class="table table-striped table-bordered table-hover">
	<thead>
		<tr class="active">
			<th>Test Name</th>	
			<th>Test ID</th>
			<th>Test Taken At</th>	
			
			<th>Students Name</th>
			<th>Students Test Result</th>
			{{-- <th>Test_User Id</th> --}}
			
		</tr>

	</thead>
	<tbody>
<?php for($i=0;$i<=count($your_students)-1; $i++) { ?>
		<tr class="warning">

@if($your_students[$i]->intro_image === "")
 <td>{{ $your_students[$i]->test_name }}</td>
@else 

<td>{!!   Html::image("test_uploads/thumbs/".$your_students[$i]->intro_image)  !!}


 {{ $your_students[$i]->test_name }}</td>
@endif
<td><b> {{ $your_students[$i]->test_id }}</b></td>	
<td><b>{{ date('H:i',strtotime($your_students[$i]->created_at))}}</b>
    | {{ date('d.m.Y',strtotime($your_students[$i]->created_at))}}
</td>

{{-- <td>{{ $your_students[$i]->user_id }}</td> --}}
@if(empty($your_students[$i]->student_id)) {{-- Users --}}

<td><?php echo $test= DB::table('users')
	->where("id", $your_students[$i]->user_id)->pluck('name'); ?>
</td>
@else  {{-- Students --}}
<td><?php echo $test= DB::table('students')
->where("id", $your_students[$i]->student_id)->pluck('student_name'); ?>
@endif 
</td>
<td><b>{{ $your_students[$i]->test_result }}</b></td>
{{-- <td>{{ $your_students[$i]->id }}</td> --}}






</tr>

			
<?php } ?>
	</tbody>
</table>
@else <h1>There are no students</h1> @endif


@endsection		