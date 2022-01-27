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

             <label for="name">Namn</label>

             <input type="name" name="name" placeholder="Firstname Surname" required>

            <label for="username">Email</label>
             <input type="text" name="email" placeholder="Email or Phone" id="username">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" id="password">
            <label for="password"><a href="#">Glömt lösenord?</a>
            </label>

            <span class="erronspan">
                {{ $error }}
            </span>

            <button>Registrera dig</button>
            <button><a href="/login">Logga in</a></button>
        </form>
    </div>
</body>
</html>