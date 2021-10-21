<!DOCTYPE html>
<html lang="en">
<head>
    @include('components/head')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="loginDiv">
        <img id="logo" src="{{ asset('img/logo.png') }}" alt="logo">
        <p>Logga in med @kfvelev-google konto för få tillgång till Auxilium</p>
        <a id="google_link" href="/auth/redirect"><img id="google_img"src="{{ asset('img/btn_google_signin_light_normal_web@2x.png') }}"></a>
    </div>
</body>
</html>