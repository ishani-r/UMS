@component('mail::message')
# {{$college_name}}

Admission Confirm Mail

<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->
<b>{{$message}}</b><br>

Thanks You,<br>
{{ config('app.name') }}
@endcomponent
