<header class="main-header">
  <!-- Logo -->
  <a href={{ URL::to('beranda') }} class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">SF</span>
    <!-- logo for regular state and mobile devices -->
    <link rel="icon" type="image/png">
    <span class="logo-lg"><b>Sabisa Farm</b></span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="{{ asset('assets/dist/img/sabisalogo.jpg') }}" class="user-image" alt="User Image">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="{{asset('assets/dist/img/sabisalogo.jpg') }}" class="img-circle" alt="User Image">
              <p>
                {{ Auth::user()->name }}
              </p>
            </li>

            <!-- Menu Footer-->
            <li class="user-footer">
             <!--  <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div> -->
              <div class="pull-right">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"
                        class="btn btn-default btn-flat">Sign out</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         {{ csrf_field() }}
                        </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
