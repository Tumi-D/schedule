@component('mail::message')
# Hello <strong>{{ $user['name'] }}</strong>,

Attached to this email is the friday schedule placements.

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
