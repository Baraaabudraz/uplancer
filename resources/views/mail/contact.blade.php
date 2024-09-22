<x-mail::message>
# New Contact Request


You have received a new contact request from the website.

**Name:** {{ $name }}

**Email:** {{ $email }}

**Subject:** {{ $tobic }}

**Message:**

{{ $message }}

<x-mail::button :url="'mailto:{{ $email }}'">
    Reply to {{ $name }}
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
