@component('mail::message')
# Contact

Here is the contact credentials from the sender.

@component('mail::button', ['url' => '/'])
Visit our site
@endcomponent

Thanks,<br>
{{ "Topsite". " for helping us!" }}
@endcomponent
