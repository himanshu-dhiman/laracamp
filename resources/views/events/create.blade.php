@extends('layouts.app')

@section('content')
<div class="container">
	<div style="font-size: 36px;">Create Event</div>
	<hr style="border: 1px solid black; ">
	<div class="col-md-6 col-sm-12 ">	
		<form action="/events" method="POST">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="email">Event Name:</label>
				<input type="text" class="form-control" name="name">
			</div>
			<div class="form-group">
				<label for="pwd">Event Theme:</label>
				<input type="text" class="form-control" name="theme">
			</div>
			<div class="form-group">
				<label for="pwd">Event Date:</label>
				<input type="date" class="form-control" name="date">
			</div>
			<div class="form-group">
				<label for="pwd">Event Venue:</label>
				<input type="text" class="form-control" name="venue">
			</div>
			<button type="submit" class="btn btn-primary">Create Event</button>
		</form>
	</div>
	<div class="col-md-offset-1 col-md-5 col-sm-12" style="display: block; border: 1px black solid; background: white;">	
		<div style="font-size: 36px; text-align: center;">
			Last Added
		</div>
		<hr style="margin: 0px;">
		<div style="padding: 20px;">	
			<div style="font-size: 20px;">
				<b class="col-md-4">Name:</b> {{$event->name}}
			</div>
			<div style="font-size: 20px;">
				<b class="col-md-4">Theme:</b> {{$event->theme}} 
			</div>
			<div style="font-size: 20px;">
				<b class="col-md-4">Date:</b> {{date('jS F, Y', strtotime($event->date))}}
			</div>
			<div style="font-size: 20px;">
				<b class="col-md-4">Venue:</b> {{$event->venue}} 
			</div>
		</div>
	</div>
	
</div>
@endsection