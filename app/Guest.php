<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['name', 'email', 'status'];

    public function guestEvent()
    {
    	return $this->hasMany(EventGuest::class);
    }

    public function guestInvite()
    {
    	return $this->hasMany(Rsvp::class);
    }
}
