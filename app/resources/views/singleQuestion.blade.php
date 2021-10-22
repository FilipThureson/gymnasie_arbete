<!DOCTYPE html>
<html lang="en">
<head>
    @include('components/head')
    <style>
        main{
            width: 100%;
            height: calc(100% - 100px);
        }
        main h1{
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%)
        }
    </style>
</head>
<body>
    @include('components/nav')
    <main>
        <h1>Under Construction</h1>
    </main>
    @include('components/footer')
    <script src="{{ asset('js/singleQuestion.js') }}"></script>
</body>
</html>