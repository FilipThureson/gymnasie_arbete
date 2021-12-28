<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  </head>
  <body>

    @include('components/nav')

    <main>
      <h1>Kurser</h1>
      <div id="wrapper">

        @foreach ($data['courses'] as $course)

        <div class="question">
            <h2>{{ $course->course_pk }}</h2>
            <div><p>0</p></div>
            <p> {{$data['quotes'][$course->course_pk]->citat }}</p>
            <a href="{{$course->course_pk}}">Gå till frågor</a>
        </div>

        @endforeach
      </div>
    </main>
    @include('components/footer')
  </body>
</html>
