@component('mail::message', ['url' => $url])
# Problem Created

Your problem has been created!

Please press the button below to confirm the creation of the problem.

@component('mail::button', ['url' => $url])
    Confirm Problem
@endcomponent

Sincerely,
Map Team.

@slot('footer')
    @component('mail::footer')
    &copy; {{now()->year}} All Rights Reserved
    @endcomponent
@endslot
@endcomponent
