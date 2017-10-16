@extends('layouts.app')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
    @section('content')
    <div class="container">
    	<h1>All Events</h1>
		<hr style="border: 1px solid black; ">
    	<div class="table-responsive col-md-8 col-xs-12" style="background: white;">
    		<table class="table">
    			<thead>
	    			<tr>
	    				<td><b>Name</b></td>
	    				<td><b>Theme</b></td>
	    				<td><b>Date</b></td>
	    				<td><b>Venue</b></td>
    				</tr>
       			</thead>
       			<tbody>
		        @foreach($events as $event)
		    		<tr>
		    			<td><a href="/events/{{$event->id}}">{{ $event->name }}</a></td>
		    			<td>{{ $event->theme }}</td>
		    			<td>{{date('jS F, Y', strtotime($event->date))}}</td>
		    			<td>{{ $event->venue }}</td>
		    		</tr>
				@endforeach
				</tbody>
       		</table>
   		</div>
   		<div class="col-md-4 col-xs-12" style="padding-top: 30px;text-align: center;">
   			<a href="/events/create" type="button" class="btn btn-info btn-lg" style="width: 250px;"> Create Event </a>
   		</div>
	</div>
	@endsection