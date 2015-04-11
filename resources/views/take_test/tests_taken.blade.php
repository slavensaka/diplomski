@extends('app')
@section('content')
{{-- {{  dd($taken_tests)}} --}}






<?php
for($i=0;$i<=count($taken_tests)-1; $i++) {
?>


<table class="table table-striped table-bordered">
	<thead>
			<tr>
				<th>Test Taker</th>
				<th>User_Id</th>
				<th>Test_Id</th>
				<th>Test_Result</th>
				<th>Test Taken At</th>
			</tr>
		</thead>
		<tbody>
			<tr class="danger">
				<td>{{ $taken_tests[$i]->name }}</td>
				<td>{{ $taken_tests[$i]->user_id }}</td>
				<td>{{ $taken_tests[$i]->test_id }}</td>
				<td><b>{{ $taken_tests[$i]->test_result }}</b></td>
				<td>{{ $taken_tests[$i]->created_at }}</td>	
						{{-- TODO SHOW THE TEST --}}
				<td>{!! link_to_route('questions.create', 'Show', array(), 
						array('class' => 'btn btn-primary',$taken_tests[$i]->test_result)) !!}
				</td>
				<td>
					{!! Form::open(array('method'=> 'DELETE', 
						'route' => array('delete_taken_test', $taken_tests[$i]->test_id))) !!}
					{!! Form::submit('Remove', array('class' => 'btn btn-danger')) !!}
					{!! Form::close() !!}
				</td>
				
			</tr>
			

		</tbody>
		</table>

		

<?php

}
?>













@endsection		