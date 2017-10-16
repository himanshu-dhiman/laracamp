@extends('layouts.app')

@section('content')

<div class="container">
    <div class="event-single" style="font-size: 22px;display: block;background: white;border: 1px solid black; padding: 30px;text-align: center;">
        <div style="font-size: 40px;">
            {{$event->name}}
        </div>
        <div>
            <strong>Theme :</strong> {{$event->theme}}
        </div>
        <div>
            <strong>Date :</strong> {{date('jS F, Y', strtotime($event->date))}}
        </div>
        <div>
            <strong>Venue :</strong> {{$event->venue}}
        </div>
    </div>
</div>

<div class="container" style="padding-top: 50px;">
	<div class="col-md-5 col-sm-12 col-xs-12 table-responsive" style="background: white;border: 1px solid black; margin-top: 30px;">
    	<div style="font-size: 30px; line-height: 30px; padding: 20px 0px;">Guests Invited</div>
	    <table class="table">
            <thead>
                <tr>
                    <td><strong>Name</strong></td>
                    <td><strong>Email</strong></td>
                    <td><strong>Status</strong></td>
              	</tr>
            </thead>
            <tbody>
	            @foreach($event->eventGuest as $guest)
	                <tr>
	                    <td>{{ $guest->guest->name }}</td>
	                    <td>{{ $guest->guest->email }}</td>
	                    @if(($guest->status) === null)
		                    <td><span class="label label-warning" style="font-size: 14px;">Invited</span></td>
		                @elseif(($guest->status) === 0)
		                    <td><span class="label label-danger" style="font-size: 14px;">Declined</span></td>
	                    @else
	                    	<td><span class="label label-success" style="font-size: 14px;">Accepted</span></td>
	                    @endif
	                </tr>
	            @endforeach
            </tbody>
    	</table>
	</div>
    <div class="col-md-offset-2 col-sm-12 col-md-5 col-xs-12 table-responsive" style="background: white;border: 1px solid black;margin-top: 30px;">
    	<div class="col-md-6 col-xs-12" style="font-size: 30px; line-height: 30px;padding: 20px 0px;">Guest List</div>
	    @if($guests!='[]')
		    <div class="col-md-6 col-xs-12" style="text-align: center;padding: 20px 0px;"><a class="btn btn-warning" style="width: 200px;" href="/events/{{$event->id}}/invite/{{ 'all' }}" >Invite All</a></div>
        	<table class="table">
        		<thead>
	                <tr>
	                    <td><strong>Name</strong></td>
	              	</tr>
        		</thead>
        		<tbody>
		            @foreach($guests as $guest)
		                <tr>
		                    <td>{{ $guest->name }}</td>
		                    <td style="text-align: center;"><a href="/events/{{$event->id}}/invite/{{$guest->id}}" class="btn btn-info" style="width: 100px;">Invite</a></td>
		                </tr>
		            @endforeach
        		</tbody>
    		</table>
    	@else
    		<div class=" col-md-12 " style="font-size: 20px;text-align: center; padding: 30px;">All Guests already Invited !!</div>	
		@endif
	</div>
</div>
@endsection