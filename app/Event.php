<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['name', 'theme', 'venue', 'date'];

    public function eventGuest()
    {
    	return $this->hasMany(EventGuest::class);
    }
}
