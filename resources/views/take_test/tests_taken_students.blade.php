@extends('app')
@section('content')
{{-- {{  dd($taken_tests)}} --}}






<?php

for($i=0;$i<=count($taken_tests)-1; $i++) {
?>


<table class="table table-striped table-bordered">
	<thead>
			<tr>
				<th>Test Taken At</th>
				<th>Test Taker</th>
				<th>Test_Result</th>
				<th>User_Id</th>
				<th>Test_Id</th>
				<th>Test_name</th>
				
				
			</tr>
		</thead>
		<tbody>
			<tr class="danger">
				<td>{{ $taken_tests[$i]->created_at }}</td>
				<td>{{ $taken_tests[$i]->student_name }}</td>
				<td><b>{{ $taken_tests[$i]->test_result }}</b></td>
				<td>{{ $taken_tests[$i]->student_id }}</td>
				<td>{{ $taken_tests[$i]->test_id }}</td>
				
				
						{{-- TODO SHOW THE TEST --}}
				<td>{!! link_to_route('show_tests_taken', 'Show', array($taken_tests[$i]->test_id,
					'test_result' => $taken_tests[$i]->test_result), 
						array('class' => 'btn btn-primary',)) !!}
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