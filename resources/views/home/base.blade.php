<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="{{  asset('fontawesome-free-5.15.3-web/css/all.css') }}" rel="stylesheet">

    <!-- Date Picker -->

    <link type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet"/>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- End Date Picker -->

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    <script src="{{ asset('javascript/base.js') }}"></script>
    @yield('title')
</head>
<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
          <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
          <div class="sidebar-content">
            <div class="sidebar-brand">
              <a href="/">JVVNL</a>
              <!--
                <div id="close-sidebar">
                <i class="fas fa-times"></i>
              </div>
            -->
            </div>
            <div class="sidebar-header">
              <div class="user-pic">
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                  alt="User picture">
              </div>
              <div class="user-info">
                <span class="user-name">{{Session::get('user')['user_first_name']}}</span>
                <strong>{{Session::get('user')['user_last_name']}}</strong>
                <span class="user-role"><strong>{{Session::get('user')['user_type']}}</strong></span>
                <span class="user-status">
                  <i class="fa fa-circle"></i>
                  <span>Online</span>
                </span>
              </div>
              <span class="user-name" style="color: #6c7b88;"><strong>{{Session::get('user')['user_email']}}</strong></span>
            </div>
            <!-- sidebar-header
            <div class="sidebar-search">
              <div>
                <div class="input-group">
                  <input type="text" class="form-control search-menu" placeholder="Search...">
                  <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="fa fa-search" aria-hidden="true"></i>
                    </span>
                  </div>
                </div>
              </div>
            </div>
              -->
            <!-- sidebar-search  -->
            <div class="sidebar-menu">
              <ul>
                <li class="header-menu">
                  <span>General</span>
                </li>
                <li>
                  <a href="/">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    <span>Home</span>
                  </a>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-male" aria-hidden="true"></i>
                    <span>Employee</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="/employee">Employee Lists</a>
                      </li>
                      <li>
                        <a href="/createemployee">Create Employee</a>
                      </li>
                      <li>
                        <a href="/pendingemployee">Pending Employee</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-building" aria-hidden="true"></i>
                    <span>Department</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="/department">Department Lists</a>
                      </li>
                      <li>
                        <a href="/createdepartment">Create Department</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    <span>Post</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="/post">Post Lists</a>
                      </li>
                      <li>
                        <a href="/createpost">Create Post</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa fa-money-check" aria-hidden="true"></i>
                      <span>Pay Martix</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="/pay">Pay Lists</a>
                        </li>
                        <li>
                          <a href="/createpay">Create Pay</a>
                        </li>
                      </ul>
                    </div>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                        <i class="fas fa-receipt" aria-hidden="true"></i>
                      <span>Salary</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="/salary">Salary Lists</a>
                        </li>
                        <li>
                          <a href="/pendingsalary">Pending Salary Lists</a>
                        </li>
                      </ul>
                    </div>
                </li>
                <li>
                    <a href="/logout">
                        <i class="fas fa-power-off"></i>
                      <span>Logout</span>
                    </a>
                  </li>
                @if(session()->get('user')['user_type'] == "Superadmin")
                <li class="header-menu">
                  <span>Admin</span>
                </li>
                <li class="sidebar-dropdown">
                    <a href="#">
                      <i class="fa fa-users" aria-hidden="true"></i>
                      <span>Admin</span>
                    </a>
                    <div class="sidebar-submenu">
                      <ul>
                        <li>
                          <a href="/admin">User Lists</a>
                        </li>
                        <li>
                          <a href="/createuser">Create User</a>
                        </li>
                      </ul>
                    </div>
                  </li>
                  @endif
              </ul>
            </div>
            <!-- sidebar-menu  -->
          </div>
          <!-- sidebar-content
          <div class="sidebar-footer">
            <a href="#">
              <i class="fa fa-bell"></i>
              <span class="badge badge-pill badge-warning notification">3</span>
            </a>
            <a href="#">
              <i class="fa fa-envelope"></i>
              <span class="badge badge-pill badge-success notification">7</span>
            </a>
            <a href="#">
              <i class="fa fa-cog"></i>
              <span class="badge-sonar"></span>
            </a>
            <a href="#">
              <i class="fa fa-power-off"></i>
            </a>
          </div>
           -->
        </nav>
        <main class="page-content">
            <div class="container-fluid">
                @include('alert')
                @yield('content')
            </div>
          </main>
        </div>
</body>
<script type="text/javascript">
    function inactivityTime(){
        onlineuser();
        function onlineuser(){
            $.ajax({
                url: '/onlineuser',
                method: 'POST',
                data: {
                    _token:"{{ csrf_token() }}"
                },
                success: function(data){
                },
            })
        }
        setInterval(function(){
            onlineuser();
        }, 60000);
        }

    // run the function
    inactivityTime();

    setTimeout(function() {
    $("#idfail").fadeOut(7000);
    });

    setTimeout(function() {
    $("#idsuccess").fadeOut(7000);
    });

    $('#datepicker').datepicker({
        dateFormat: 'dd-mm-yy'
    });

</script>
</html>
<?php

if(session()->get('fail')){
    Session::forget('fail');
}

elseif(session()->get('success')) {
    Session::forget('success');
}
?>
