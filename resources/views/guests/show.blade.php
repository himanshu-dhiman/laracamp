@extends('layouts.app')
@section('content')
<div class="container">
    <div class="guest-single" style="font-size: 22px;display: block;background: white;border: 1px solid black; padding: 30px;text-align: center;">
        <div style="font-size: 40px;">
            {{$guest->name}}
        </div>
        <div>
            <b>Email :</b> {{$guest->email}}
        </div>
    </div>
</div>
<div class="container" style="padding-top: 50px;">
    <div class="col-md-8 col-sm-12 col-xs-12 table-responsive" style="background: white;border: 1px solid black; margin-top: 30px;">
        <div style="font-size: 30px; line-height: 30px; padding: 20px 0px;">Events Status</div>
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
            @foreach($guest->guestEvent as $event)
                <tr>
                    <td>{{ $event->event->name }}</td>
                    <td>{{ $event->event->theme }}</td>
                    <td>{{date('jS F, Y', strtotime($event->event->date))}}</td>
                    <td>{{ $event->event->venue }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection