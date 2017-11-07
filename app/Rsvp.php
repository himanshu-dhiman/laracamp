<?php

namespace app;

use Illuminate\Database\Eloquent\Model;

class Rsvp extends Model
{
	protected $fillable = ['guest_id', 'token', 'invite_id'];

	public function guest()
	{
		return $this->belongsTo(Guest::class);
	}

	public function invite()
	{
		return $this->belongsTo(EventGuest::class);
	}
}
