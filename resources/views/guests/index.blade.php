@extends('layouts.app')
<style type="text/css">
	
</style>
    @section('content')
    <div class="container">
    	<h1>All Guests</h1>
		<hr style="border: 1px solid black; ">
    	<div class="table-responsive col-md-8 col-xs-12" style="background: white;">
    		<table class="table">
    			<thead>
	    			<tr>
	    				<td><b>Name</b></td>
	    				<td><b>Email</b></td>
    				</tr>
       			</thead>
       			<tbody>
		        @foreach($guests as $guest)
		    		<tr>
		    			<td><a href="/guests/{{$guest->id}}">{{ $guest->name }}</a></td>
		    			<td>{{ $guest->email }}</td>
		    		</tr>
				@endforeach
				</tbody>
       		</table>
   		</div>
   		<div class="col-md-4 col-xs-12" style="padding-top: 30px;text-align: center;">
   			<a href="/guests/create" type="button" class="btn btn-info btn-lg" style="width: 250px;"> Add Guest </a>
   		</div>
	</div>
	@endsection