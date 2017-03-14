
@component('mail::message')

Thanks so much for registering!

@component('mail::button', ['url' => 'http:/seleniummadeeasy.com'])
Subscribe
@endcomponent

@component('mail::panel', ['url' => ''])
This is new netflix for your career.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
