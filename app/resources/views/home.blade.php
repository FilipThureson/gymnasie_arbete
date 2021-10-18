<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('components/head')
  </head>
  <body>

    @include('components/nav')

    <main>
      <h1>Kurser</h1>
      <div id="wrapper">

        @foreach ($courses as $course)
        
        <div class="question">
            <h2>{{ $course->course_pk }}</h2>
            <div><p>0</p></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
            <a href="{{$course->course_pk}}">Gå till frågor</a>
        </div>
          
        @endforeach
      </div>
    </main>
    <footer>
    </footer>
  </body>
</html>