<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message From {{env('APP_NAME')}}</title>
</head>
<body>

    <h4>Message From {{env('APP_NAME')}}</h4>
    <p>Dear {{ $username }},</p>
    <hr>
    <p>{{$info}}</p>
    <p>{{ env('APP_NAME') }} Team</p>
</body>
</html>