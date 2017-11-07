<?php

namespace app\Http\Controllers;

use Illuminate\Http\Request;
use app\Guest;
use app\Rsvp;

class RsvpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Rsvp  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function show(Rsvp $rsvp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Rsvp  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function edit(Rsvp $rsvp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Rsvp  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rsvp $rsvp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Rsvp  $rsvp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rsvp $rsvp)
    {
        //
    }

    public function rsvp ($token)
    {
        $invites=Rsvp::where('token', $token)->where('status', '0')->get();
        if($invites != '[]') {
            return view('rsvp.index');
        }
        else {
            return view('rsvp.error');
        }
    }

    public function response (Request $request)
    {
        $response = Guest::whereHas('guestInvite', function($subquery) use($request){
            $subquery->where('id', '=', '3');
        })->get();
        dd($response);
        if($invites != '[]') {
            return view('rsvp.index');
        }
    }
}
