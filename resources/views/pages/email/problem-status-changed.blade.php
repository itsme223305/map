@component('mail::message', ['status' => $status])

    {{-- Body --}}
    # Problem Status Changed

    Your problem status has been changed to {{$status}}!
    Thank you for your help!

    Sincerely
    Map Team.

    @slot('footer')
        @component('mail::footer')
        &copy; {{now()->year}} All Rights Reserved
        @endcomponent
    @endslot

    {{-- Subcopy --}}
    @if(isset($subcopy))
        @slot('subcopy')
            @component('mail::subcopy')
                {{ $subcopy }}
            @endcomponent
        @endslot
    @endif
@endcomponent

