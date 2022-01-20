<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="loginDiv">
        <img id="logo" src="{{ asset('img/logo.png') }}" alt="logo">

        <span class="erronspan">
            {{ $error }}
        </span>

        <form action="/api/register" method="post">
            <input type="name" name="name" placeholder="Firstname Surname" required>
            <input type="email" name="email" placeholder="Email:" required>
            <input type="password" name="password" placeholder="Password:" required>
            <button type="submit">Register</button>
        </form>

        <a style="text-decoration: underline;" href="/login">login</a>
    </div>
</body>
</html>
