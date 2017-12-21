

<header class="main-header" >
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>VS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Variety Store</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav" id="app">

          
          <!-- Notifications: style can be found in dropdown.less -->
          
          

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset(Auth::user()->image) }}" class="user-image" alt="User Image">
              <span class="hidden-xs"> {{ Auth::user()->name }} </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset(Auth::user()->image) }}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }} - Admin
                  <small>Member since {{ Auth::user()->created_at->format('d.m.Y') }}</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div ></div>
                <div class="pull-left">
                  <a href="{{ route('user.show',Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                </div>

                <div class="pull-right">
                  <a href="{{ route('logout') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>

                <div class="col-lg-1">
                  <a href="{{ route('home') }}" class="btn btn-default btn-flat">Front-end</a>
                </div>
              </li>

            </ul>
          </li>

        </ul>
      </div>
    </nav>
</header>

<script src="/js/welcome.js"></script>
