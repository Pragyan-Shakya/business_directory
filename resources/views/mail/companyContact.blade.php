<!DOCTYPE html>
<html>
    <head>
        <title>
            {{ config('app.name') }} | Contact Mail from {{ $data['name'] }}
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h3>Contact Message</h3>
        <strong>Name:</strong> {{ $data['name'] }}<br>
        <strong>Email:</strong> {{ $data['email'] }}<br>
        <strong>Message:</strong><br>
        {{ $data['message'] }}
    </body>
</html>