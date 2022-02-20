<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="loginDiv">


            <form action="/api/login" method="post">
             <img id="logo" src="{{ asset('img/logo.png') }}" alt="logo">

            <label for="username">Email</label>
            <input type="email" name="email" placeholder="Email" id="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            <label for="password"><a href="/forgotPassword">Glömt lösenord?</a>
            </label>

            <span class="erronspan">
                {{ $error }}
            </span>

            <button>Logga in</button>
            <span>
                Inget Konto? <a class="register-link" href="/register">Registrera dig</a>
            </span>
        </form>


    </div>
</body>
</html>
