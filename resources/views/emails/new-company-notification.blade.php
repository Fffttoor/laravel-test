@component('mail::message')
    # New Company Created

    A new company has been created:

    - **Name:** {{ $company->name }}
    - **Email:** {{ $company->email }}

    Thank you,<br>
    {{ config('app.name') }}
@endcomponent
