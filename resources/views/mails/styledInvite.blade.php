@component('mail::message')
# Hi {{ $guest->name }}

The Laracamp Team invites you to join us for a celebration of <b>{{ $event->name }}</b> on : <b>{{date('jS F, Y', strtotime($event->date))}}</b>. Cocktails and Chinese Snacks will be served. The Venue for the Party will be <b>{{ $event->venue }}</b>.

Please Respond us back with the status of your presence, on the below link.

@component('mail::button', ['url' => 'laracamp.dev/rsvp/api_token='.$token])
Click Here to Respond to Invitation
@endcomponent

Thanks,<br>
Himanshu Dhiman,
LaraCamp
@endcomponent
