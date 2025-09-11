{{-- <x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message> --}}

@component('mail::message')
# Hello {{ $booking->full_name }},

{!! nl2br(e($messageBody)) !!}

@component('mail::panel')
**Confirmation Code:** {{ $booking->confirmation_code }}  
**Service(s):** {{ collect($booking->services)->join(', ') }}  
**Date/Time:** {{ optional($booking->preferred_date)->format('M d, Y') }} @if($booking->preferred_time) at {{ $booking->preferred_time }} @endif
@endcomponent

Thanks,  
**Zeeva Nails**
@endcomponent
