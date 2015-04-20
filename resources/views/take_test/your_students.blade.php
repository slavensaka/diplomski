@extends('app')
@section('content')
{{-- {!! dd($your_students) !!} --}}


@if(count($your_students))

<h4>Ovo su studenti</h4>
<?php for($i=0;$i<=count($your_students)-1; $i++) { ?>

<table class="table table-striped table-bordered">
	<thead>
		<tr class="active">
			<th>Test Id/Name</th>	
			{{-- <th>User ID</th> --}}
			<th>Students Name</th>
			<th>Students Test Result</th>
			{{-- <th>Test_User Id</th> --}}
			<th>Test Taken On</th>
		</tr>
	</thead>
	<tbody>
		<tr class="info">
@if($your_students[$i]->intro_image === "")
<td>TEST ID: <b> {{ $your_students[$i]->test_id }}</b> | {{ $your_students[$i]->test_name }}</td>
@else 

<td>{!!   Html::image("test_uploads/thumbs/".$your_students[$i]->intro_image)  !!}


TEST ID: <b> {{ $your_students[$i]->test_id }}</b> | {{ $your_students[$i]->test_name }}</td>
@endif
	
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

<td>At:{{ date('H:i',strtotime($your_students[$i]->created_at))}}
    | On:{{ date('d.m.Y',strtotime($your_students[$i]->created_at))}}
</td>




</tr>
	</tbody>
</table>
			
<?php } ?>

@else <h1>There are no students</h1> @endif


@endsection		