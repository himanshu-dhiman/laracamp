<?php

namespace app\Http\Controllers;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use app\Event;
use app\Guest;

class StyledInvite extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $event;
    public $guest;
    public $token;

    public function __construct(Event $event, Guest $guest, $token)
    {
       $this->guest = $guest;
       $this->event = $event;
       $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.styledInvite');
    }
}
