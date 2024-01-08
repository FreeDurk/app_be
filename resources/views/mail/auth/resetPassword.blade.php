<x-mail::message>
# Password Reset

Click password reset link.

<x-mail::button :url="''">
RESET
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
