<!doctype html>
<html lang="en">
<head>
    @include('components/head')
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
    <script src="https://cdn.tiny.cloud/1/fsua0ssfdpv74dcehnti9bto8m8q0u2ddzpc5c71y2cihi5k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="http://localhost/php-services/integration/WIRISplugins.js?viewer=image"></script>
</head>
<body>

    @include('components/nav')

        
    
    <div class="wrapper" id="fixedWrapper">
        <div id="loader" class="lds-dual-ring"></div>
        <main>
          <h1>{{$course->course_pk}}</h1>
          
  
        </main>
  
        <aside>
  
          <svg id="aside_btn" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-text" viewBox="0 0 16 16">
            <path d="M2 1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h9.586a2 2 0 0 1 1.414.586l2 2V2a1 1 0 0 0-1-1H2zm12-1a2 2 0 0 1 2 2v12.793a.5.5 0 0 1-.854.353l-2.853-2.853a1 1 0 0 0-.707-.293H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12z"/>
            <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
          </svg>
        </aside>
      </div>
      <div id="slide">
        <div>
          <h3>Ställ en fråga</h3>

          <div>
            <svg id="upload_btn" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload svg_icon" viewBox="0 0 16 16">
              <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
              <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708l3-3z"/>
            </svg>

            <svg id="close_slide" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg svg_icon" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"/>
              <path fill-rule="evenodd" d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"/>
            </svg>
          </div>
        </div>

        <form id="upload_form">
          <input id="course" type="hidden" value="{{ $course->course_pk }}">
          <input id="user_fk" type="hidden" value="{{ Session::get('email') }}">
          <input id="title" placeholder="Titel"><br>
          <textarea rows="30" cols="30" id="q_text" placeholder="Beskrivning"></textarea><br>
          </form>
      </div>
    
    @include('components/footer')
    <script src="{{ asset('js/ajax-course.js') }}" defer></script>
    <script>
        tinymce.init({
            selector: '#q_text',
            plugins: "tiny_mce_wiris",
            menubar: false,
            resize: false,
            toolbar: 'undo redo bold italic underline tiny_mce_wiris_formulaEditor',
            mathTypeParameters : {
              serviceProviderProperties : {
                URI : 'http://localhost/php-services/integration',
                server : 'php'
              }
            },
        });
    </script>
</body>
</html>
