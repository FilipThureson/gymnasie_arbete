<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="loginDiv">


            <form action="/api/resetPasswordFrom/{{$token}}" method="post">
             <img id="logo" src="{{ asset('img/logo.png') }}" alt="logo">

            <label for="username">New Password</label>
            <input type="password" name="password" placeholder="Password" required>

            <label for="password">Confirm Password</label>
            <input type="password" name="passwordConfirm" placeholder="Password" required>

            <span class="erronspan">
                {{ $error }}
            </span>

            <button>Byt lösenord</button>
        </form>


    </div>
</body>
</html>
