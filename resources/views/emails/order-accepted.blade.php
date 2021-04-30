@component('mail::message')
# Success!

{{ $message }}

@component('mail::button', ['url' => 'https://buy-event.000webhostapp.com/'])
Open website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
