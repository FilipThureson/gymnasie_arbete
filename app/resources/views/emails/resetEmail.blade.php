<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notification!</title>
</head>
<body>
    <h1>Reset Password</h1>
    <p>
        Hello {{ $details['fullname']}}, You've requested to reset your password to do that click the following link!
        <a href="https://te-auxilium.se/resetPassword/{{ $details['token'] }}">Reset Password</a>
    </p>
</body>
</html>
