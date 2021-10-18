<!doctype html>
<html lang="en">
<head>
    @include('components/head')
    <style>
        #upload form button{
            color: black;
            font-size: large
        }
    </style>
</head>
<body>

    @include('components/nav')

    <div id="upload">
        <form id="upload_form">
            <input style="color: black" id="course" type="hidden" value="{{ $course->course_pk }}">
            <input style="color: black"  id="user_fk" type="hidden" value="{{ Session::get('email') }}">
            <input style="color: black"  id="title" placeholder="Titel"><br>
            <textarea style="color: black" rows="10" cols="30" id="q_text" style="resize: none"></textarea><br>
            <button id="upload_btn">Ladda Upp!</button>
        </form>
    <div>
    
    <h1>{{$course->course_pk}}</h1>
    <div id="questions">
        
    </div>
    <div id="loader" class="lds-dual-ring hidden overlay"></div>
    @include('components/footer')
</body>
</html>
