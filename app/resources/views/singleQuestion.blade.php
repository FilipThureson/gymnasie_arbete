<!DOCTYPE html>
<html lang="en">
<head>
    <x-head.head/>
    <link rel="stylesheet" href="{{ asset('css/answers_first.css') }}">
    <link rel="stylesheet" href="{{ asset('css/answers.css') }}">
</head>
<body>
    @include('components/nav')
    <div class="wrapper" id="fixedWrapper">
        <main id="main">

        </main>

      <div id="slide">
        <div>
          <h3>Svara</h3>

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
          <input type="hidden" id="user_fk" value="{{ Session::get('email') }}">
          <textarea rows="40  " cols="30" id="q_text" placeholder="Beskrivning"></textarea><br>
        </form>
      </div>

      <div id="slide_left">
        <h1>Frågan:</h1>
      </div>

    <script>
      const user_fk_del = "{{ Session::get('email') }}";
    </script>
    <script src="{{ asset('js/singleQuestion.js') }}"></script>
    <script src="{{ asset('js/singleQ_ClickScript.js') }}"></script>
    <x-head.tinymce-config/>
</body>
</html>
