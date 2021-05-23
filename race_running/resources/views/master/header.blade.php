<!--==============================header=================================-->
<header>
   <div class="container_12">
      <div class="row">
         <div class="col-sm-10"></div>
         <div class="col-sm-2">
            @if(Cookie::has('loginSuccess'))
            <div class="dropdown">
               <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{ Cookie::get('loginSuccess') }}
               <span class="caret"></span></button>
               <ul class="dropdown-menu">
                  <li><a href="{{ url('/logout') }}">Đăng xuất</a></li>
               </ul>
            </div>

            @elseif(Session::has('loginSuccess'))
            <div class="dropdown">
               <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{ Session::get('loginSuccess') }}
               <span class="caret"></span></button>
               <ul class="dropdown-menu">
                  <li><a href="/logout">Đăng xuất</a></li>
               </ul>
            </div>
            @else
            <button class="btn btn-primary"> <a style="color: white;" href="{{ url('/login') }}"> Đăng nhập</a></button>
            <button class="btn btn-success"> <a style="color: white;" href="{{ url('register') }}"> Đăng ký</a></button>

            @endif
         </div>
      </div>
      <div class="grid_12">
         <div class="socials">
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-facebook"></a>
            <a href="#" class="fa fa-google-plus"></a>
            <a href="#" class="fa fa-instagram"></a>
         </div>
         <h1>
            <a href="index.html">
            <img src="images/logo.png" alt="Your Happy Family">
            </a>
         </h1>
         <div class="menu_block">
            <nav class="horizontal-nav full-width horizontalNav-notprocessed">
               <ul class="sf-menu">
                  <li class="current"><a href="/">Home</a></li>
                  <li><a href="about">About Club</a></li>
                  <li><a href="race">Race Calendar</a></li>
                  <li><a href="member">Membership</a></li>
                  <li><a href="contact">Contacts</a></li>
               </ul>
            </nav>
            <div class="clear"></div>
         </div>
      </div>
      <div class="clear"></div>
   </div>
</header>