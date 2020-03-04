@component('mail::message')
# Congratulations

<p>Hello {{ $user->name }},</p>
<p>We just want to wish you a happy birthday!</p>
<p>Hope you have a good one!</p>

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
