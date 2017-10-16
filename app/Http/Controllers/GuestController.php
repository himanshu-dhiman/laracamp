<?php

namespace app\Http\Controllers;

use app\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
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
        $guests = Guest::all();
        return view('guests.index')->with('guests', $guests);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $guest = Guest::create($request->except('_token'));
        return redirect('/guests');
    }

    /**
     * Display the specified resource.
     *
     * @param  \app\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show(Guest $guest)
    {   
        return view('guests.show')->with('guest', $guest);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \app\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit(Guest $guest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \app\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guest $guest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \app\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guest $guest)
    {
        //
    }
}
