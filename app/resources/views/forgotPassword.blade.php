<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="loginDiv">


            <form action="/api/resetPassword" method="post">
             <img id="logo" src="{{ asset('img/logo.png') }}" alt="logo">

            <label for="password">Full Name</label>
            <input type="text" name="fullname" placeholder="Fullname" id="password" required>

            <label for="username">Email</label>
            <input type="text" name="email" placeholder="Email" id="username" required>

            <span class="erronspan">
                {{ $error }}
            </span>

            <button>Reset Password</button>
            <span>
                <a class="register-link" href="/login">Gå tillbaka</a>
            </span>
        </form>


    </div>
</body>
</html>
