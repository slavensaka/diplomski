@extends('app')
@section('content')
{!! Html::script('js/jquery-1.11.2.min.js') !!}
{!! Html::script('js/search.js') !!}
{!! Html::script('js/search/jquery-ui.min.js') !!}
{!! Html::script('js/search/jquery.select-to-autocomplete.js') !!}
{!! HTML::style('js/search/jquery-ui.css'); !!}
<style>
	  body {
	    font-family: Arial, Verdana, sans-serif;
	    font-size: 13px;
	  }
    .ui-autocomplete {
      padding: 0;
      list-style: none;
      background-color: #fff;
      width: 218px;
      border: 1px solid #B0BECA;
      max-height: 350px;
      overflow-x: hidden;
    }
    .ui-autocomplete .ui-menu-item {
      border-top: 1px solid #B0BECA;
      display: block;
      padding: 4px 6px;
      color: #353D44;
      cursor: pointer;
    }
    .ui-autocomplete .ui-menu-item:first-child {
      border-top: none;
    }
    .ui-autocomplete .ui-menu-item.ui-state-focus {
      background-color: #D5E5F4;
      color: #161A1C;
    }
	</style>



					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif


	<div>Search for tests by test name:</div>
	<div class="search">
	{!! Form::open(array('url' => url('search'), 'class'=>'form', 'id'=>'searchform')) !!}
    {!! Form::text('query', null, array("id"=>"query", "class"=>"query",'placeholder' => 'Search query...' )) !!}
    {!! Form::submit('Search') !!}
    {!! Form::close() !!}
	</div>

	<div class="result"></div>
{{-- 
{!! link_to_route('take_test', 'Take This Test', 
array($id), array('class' => 'btn btn-success')) !!}

 --}}
<script>
	  (function($){
	    $(function(){
	      $('select.query_tag').selectToAutocomplete();
	      $('form.form_tag').submit(function(e){
	      	e.preventDefault();
	         $.ajax({
      			url: "../"+"search_tag",
      			type: "post",
      			data: {'query_tag':$("input.query_tag").val(), '_token': $('input[name=_token]').val()},
      			success: function(data){
        		// $("div.result_tag").append(data);
        		var get = JSON.parse(data);
        		$('div.result_tag').empty();
         		  if($.isEmptyObject(get)){
           		  $("div.result_tag").html("No test found");
     			 }
     			jQuery.each( get, function( i, val ) {
          			$("<a href="+"take"+"/"+val.id+">"+val.test_name+"</a><br>").appendTo("div.result_tag");
        		});
      		}
    			});  
	      });
	    });
	  })(jQuery);
	</script>

<br/><br/>


	<div>Search for tests by there tag:</div>
	<div class="search_tag">
	{!! Form::open(array('url' => url('search_tag'), 'class'=>'form_tag', 'id'=>'searchform_tag')) !!}
    
    {!! Form::select('query_tag', [null=>'Please Select'] +$tag_unique, null, array( "class"=>"query_tag",'placeholder' => 'Search query...' )) !!}
    {!! Form::submit('Search') !!}
    {!! Form::close() !!}
	</div>

	<div class="result_tag"></div>

	
@endsection
