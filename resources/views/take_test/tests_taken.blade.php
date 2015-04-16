@extends('app')
@section('content')
{{-- {{  dd($taken_tests)}} --}}




@if(count($taken_tests))

<?php

for($i=0;$i<=count($taken_tests)-1; $i++) {
?>

<h1>Tests you have taken:</h1>
<table class="table table-striped table-bordered">
	<thead>
			<tr>
<th>Test Id/Name</th>
<th>Student Name</th>
<th>Your Test Result Was</th>
<th>Test Taken On</th>
			
				
			

				
		{{-- 		
				<th>User_Id</th>
				
					<th>Id</th> --}}
					
				<th>Show Test</th>
				
				<th>Remove Test</th>
				
				
			</tr>
		</thead>
		<tbody>
			<tr class="danger">
<td>TEST ID: <b>{{ $taken_tests[$i]->test_id }}</b> |
{{  $test= DB::table('tests')->where("id", $taken_tests[$i]->test_id)->pluck('test_name') }}
</td>
<td>{{ $taken_tests[$i]->name }}</td>
<td><b>{{ $taken_tests[$i]->test_result }}</b></td>

	
<td>At:{{ date('H:i',strtotime($taken_tests[$i]->created_at))}} 
    | On:{{ date('d.m.Y',strtotime($taken_tests[$i]->created_at))}}
</td>
				
				
				
				
				{{-- 
				<td>{{ $taken_tests[$i]->user_id }}</td>
				
				<td>{{ $taken_tests[$i]->id }}</td>
				 --}}
				

						{{-- TODO SHOW THE TEST --}}
				<td>{!! link_to_route('show_tests_taken', 'Show', array($taken_tests[$i]->test_id,
					'test_result' => $taken_tests[$i]->test_result), 
						array('class' => 'btn btn-primary',)) !!}
				</td>
				<td>
					{!! Form::open(array('method'=> 'DELETE', 
						'route' => array('delete_taken_test', $taken_tests[$i]->test_id))) !!}
					{!! Form::hidden("id", $taken_tests[$i]->id, false) !!}
					{!! Form::submit('Remove', 
					array('onclick' =>"if(!confirm('Are you sure?')) return false;",
					'class' => 'btn btn-danger')) !!}
					{!! Form::close() !!}
				</td>
				
			</tr>
			

		</tbody>
		</table>

		

<?php

}


?>
@else
<h1>There are no tests taken</h1>
@endif












@endsection		