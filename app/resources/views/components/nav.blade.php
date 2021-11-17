<header>
  <a id="logotype" href="/"><img id="logo1" src="{{ asset('img/AUXILIUM_TEXT.png') }}" alt="AUXILIUM LOGO"><img id="logo2" src="{{ asset('img/AUXILIUM_SIDE.PNG') }}" alt="AUXILIUM LOGO"></a>
  <div class="hamburger">
    <div class="line"></div>
    <div class="line"></div>
    <div class="line"></div>
  </div>
  <ul id="nav-links">
    <li><a href="/questions/user/{{ Session::get('email') }}">Dina frågor</a></li>
    <li><a target="_blank" href="https://web.skola24.se/timetable/timetable-viewer/kunskapsforbundetvast.skola24.se/Birger%20Sj%C3%B6bergsgymnasiet/">Schema</a></li>
    <li><a href="/logout">Logga Ut</a></li>
    <a href="#"><img src="{{Session::get('avatar')}}" alt="Profile img" id="icon" class="icon"></a>
  </ul>
</header>

<script src="{{ asset('js/menu.js') }}"></script>