<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/profileSettings.css') }}">
</head>
<body>
    @include('components/nav')

    <div class="wrapper">
        <div class="pfpSettings">
            <h4>
                Nuvarande Profil Bild
            </h4>
            <img src="{{ asset('img/pfps/' . Session::get('avatar')) }}" alt="Profil bild" class="profilePicture">
        </div>
    </div>

</body>
</html>
