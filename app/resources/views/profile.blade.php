<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/profileSettings.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />

</head>
<body>
    @include('components/nav')

    <div class="wrapper">
        <div class="pfpSettings">
            <h4>
                Nuvarande Profil Bild
            </h4>
            <input style="display: none;" type="file" name="newPicture" id="pfpInp">
            <img src="{{ asset('img/pfps/' . Session::get('avatar')) }}" alt="Profil bild" id="pfpImg" class="profilePicture">
        </div>
    </div>

    <div id="pfpConfirm">
        <div id="popUpWrapper">
            <h2>Ny profilbild</h2>
            <img id="newPfp">
        </div>
        <button id="confirmNewPfp">Change</button>
    </div>

    @include('components/footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <script src="{{ asset('js/profile.js') }}"></script>
</body>
</html>
