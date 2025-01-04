<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $subject }}</title>
    <style>
        p.header {
            font-size: 4rem;
            color: red;
        }
    </style>
</head>
<body>
    <p class="header">Hello, {{$user->name}}</p>
    <p>{{ $messageContent }}</p>
</body>
</html>