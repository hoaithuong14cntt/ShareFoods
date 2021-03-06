<header id="header">
  <div class="menu-top">
    <div class="container">
      <div class="row">
        <div class="logo col-md-3 col-xs-3">
          <div class="wrp-img">
            <a href=""><img src="/share_foods/assets/img/logo/logo2.png" alt=""></a>
          </div>
        </div>
        <div class="top-right col-md-9 col-xs-9">
          <div class="toggle-menu item">
            <a data-toggle="collapse" data-target=".header-navbar" class="btn-toggle"><i class="fa fa-bars"></i></a>
          </div>
          <div class="search col-md-6 col-sm-6 item">
            <form action="{{ route('sharefood.search') }}" method="POST">
              {{csrf_field()}}
              <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="submit">Go!</button>
                </span>
              </div>
            </form>
          </div>
          <div class="user-features col-md-6 col-sm-6 item">
          @if(Auth::check())
            <div class="user dropdown item-feature">
              <img src="{{ Auth::user()->avatar }}" alt="">
              <a href="" class="btn-user  dropdown-toggle" data-toggle="dropdown">
              {{ Auth::user()->firstname }}
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="{{ route('sharefood.profile.index', ['user' => Auth::user()->id]) }}">Profile</a></li>
                <li><a href="{{ route('sharefood.auth.logout') }}">Logout</a></li>
              </ul>
            </div>
          @else
            <div class="signIn item-feature"><a href="" class="btn-signIn" data-toggle="modal" data-target="#modal-signIn"><i class="fa fa-sign-in"></i>Login</a></div>
            <div class="signUp item-feature"><a href="" class="btn-signUp" data-toggle="modal" data-target="#modal-signUp"><i class="fa fa-user"></i>Register</a></div>
          @endif
          </div>
          <div class="btn-modal-search item">
            <a href="" data-toggle="modal" data-target="#modal-search" class="btn-search"><i class="fa fa-search"></i></a>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
  @php
    $currentRouteName = Route::currentRouteName();
  @endphp
  <nav class="navbar" role="navigation" data-spy="affix" data-offset-top="57">
    <div class="container">
      <div class="row">
        <div class="collapse navbar-collapse header-navbar">
          <ul class="nav navbar-nav ">
            <li class="item-menu @if ($currentRouteName == 'sharefood.index') active @endif"><a href="{{ route('sharefood.index') }}">home</a></li>
            <li class="item-menu"><a href="#interested">interested</a></li>
            <li class="item-menu"><a href="#news">news</a></li>
            <li class="item-menu"><a href="#aboutUs">about us</a></li>
            <li class="item-menu @if ($currentRouteName == 'sharefood.contact') active @endif"><a href="{{ route('sharefood.contact') }}">contact</a></li>
            <li class="item-menu @if ($currentRouteName == 'sharefood.searchAll') active @endif"><a href="{{ route('sharefood.search') }}">search</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
