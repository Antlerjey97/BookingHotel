<header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HotelBooking</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" style="font-size: 15px"><b>HotelBooking.com</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
              <ul class="dropdown-menu">
                  <a class="container-fluid" href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                      Đăng xuất
                      <i class="fa fa-sign-out" style="font-size: 20px; float: right; color: rgb(166, 166, 166)"></i>
                  </a>

                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                  </form>
                  </li>
              </ul>

              {{--            <ul class="dropdown-menu">--}}
              {{--              <!-- User image -->--}}
              {{--              <!-- Menu Body -->--}}
              {{--              <li class="user-body">--}}
              {{--                <a href=""></a>--}}

              {{--                 <div class="pull-right">--}}
{{--                  <a class="dropdown-item" href="{{ //route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ //route('logout') }}" method="POST" style="display: none;">--}}
{{--                                          @csrf--}}
{{--                                    </form>--}}
{{--                </div>--}}
              {{--              </li>--}}
              {{--            </ul>--}}
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
