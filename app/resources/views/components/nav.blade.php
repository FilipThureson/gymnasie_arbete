<!--<div style="display: flex; align-items: center">
    
    <img style="border-radius: 50%;"src="{{Session::get('avatar')}}"></img>
</div>-->
<header>
    <a href="#"><img src="logo.png" alt="AUXILIUM LOGO"></a>
    <ul>
      <li><a href="#">Dina frågor</a></li>
      <li><a href="#">Schema</a></li>
      <li><a href="#">Om oss</a></li>
      <a href="/logout">Logout!</a>
      <a href="#"><img src="{{Session::get('avatar')}}" alt="Profile img" id="icon"></a>
    </ul>
  </header>