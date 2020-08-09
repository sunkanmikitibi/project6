@component('mail::message')
# Welcome {{ $data['firstname'] }},

Thank You for Registering With us {{ $data['firstname'] .' '.$data['lastname'] }}.

<p> Your Details </p>
<hr>
Email Address: {{ $data['email'] }},<br />
Phone Number: {{ $data['phone'] }}, <br />

@component('mail::button', ['url' => 'http://project6.test'])
Visit Our Website
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
