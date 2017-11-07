<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Event;
use app\EventGuest;
use app\Guest;
use app\Http\Controllers\StyledInvite;
use app\Rsvp;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $events = Event::all();
        return view('events.index')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $event = Event::latest('created_at')->first();
        return view('events.create')->with('event', $event);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        $event = Event::create($request->except('_token'));
        return redirect('/events');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {   
        $guests = Guest::whereDoesntHave('guestEvent', function($subquery) use ($event){
            $subquery->where('event_id', '=', $event->id);
        })->get();
        return view('events.show')->with('event', $event)->with('guests', $guests);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        // return view('events.create')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function invite(Event $event,Guest $guest)
    {   
        // if($guest==='all') :
        //     $guests = Guest::whereDoesntHave('guestEvent', function($subquery) use ($event){
        //         $subquery->where('event_id', '=', $event);
        //     })->get();
        //     foreach ($guests as $guest) {
        //         EventGuest::create(['event_id' => $event, 'guest_id' => $guest->id]);
        //     }
        // else :
            EventGuest::create(['event_id' => $event->id, 'guest_id' => $guest->id]);
        // endif;
            $token = str_random(32);
            $invitation = EventGuest::latest('id')->first();
            Rsvp::create(['guest_id' => $guest->id, 'token' => $token, 'invite_id' => $invitation->id, 'status' => '0']);
            \Mail::to($guest->email)->send(new StyledInvite($event, $guest, $token));
            return redirect('/events/'.$event->id);
    }
}
