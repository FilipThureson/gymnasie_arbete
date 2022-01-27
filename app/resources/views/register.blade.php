<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="loginDiv">

    <form action="/api/register" method="post">
             <img id="logo" src="{{ asset('img/logo.png') }}" alt="logo">

             <label for="name">Namn</label>

             <input type="name" name="name" placeholder="Full name" required>

            <label for="username">Email</label>
             <input type="email" name="email" placeholder="Email" id="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password" required>
            </label>

            <span class="erronspan">
                {{ $error }}
            </span>

            <button>Registrera dig</button>
            <span>
                Har du redan ett Konto? <a class="register-link" href="/login">Logga in istället!</a>
            </span>
        </form>
    </div>
</body>
</html>
