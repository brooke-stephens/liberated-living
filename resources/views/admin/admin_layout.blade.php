<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Liberated Living Administration Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}" /> -->
    <!-- Bootstrap CSS-->
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="{{ URL::to ('srv/css/admincss/fontastic.css') }}">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="{{ URL::to ('srv/css/admincss/grasp_mobile_progress_circle-1.0.0.min.css') }}">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->

    <!-- <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet"> -->
    <link rel="stylesheet" href="{{ URL::to ('srv/css/admincss/style.default.css') }}">

    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ URL::to ('srv/css/admincss/custom.css') }}">
    <!-- Favicon-->
    <!-- <link rel="shortcut icon" href="img/favicon.ico"> -->
    <link rel="shortcut icon" href="{{ URL::to ('images/adminimg/favicon.ico') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>

  <body>
    <!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="{{ URL::to ('images/adminimg/avatar-1.jpg') }}" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">Administration</h2><span>Admin Panel</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="{{ Route('admin.index') }}"> <i class="icon-home"></i>Home                             </a></li>
            <!-- <li><a href="forms.html"> <i class="icon-form"></i>Forms                             </a></li>
            <li><a href="charts.html"> <i class="fa fa-bar-chart"></i>Charts                             </a></li>
            <li><a href="tables.html"> <i class="icon-grid"></i>Tables                             </a></li> -->
            <li><a href="#ProductDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Products </a>
              <ul id="ProductDropdown" class="collapse list-unstyled ">
                <li><a href="{{ Route('admin.add.product') }}">Add Product</a></li>
                <li><a href="{{ Route('admin.view.products') }}">View Products</a></li>
                
              </ul>
            </li>
            <li><a href="#OrderDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Orders </a>
              <ul id="OrderDropdown" class="collapse list-unstyled ">
                <li><a href="#">View Orders</a></li>
                <li><a href="#">Edit Order</a></li>
                
              </ul>
            </li>
            <li><a href="#UserDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Users </a>
              <ul id="UserDropdown" class="collapse list-unstyled ">
                <li><a href="#">View Users</a></li>
                <li><a href="#">Add User</a></li>
                <li><a href="#">Edit User</a></li>
                
              </ul>
            </li>
            <li><a href="login.html"> <i class="icon-interface-windows"></i>Login page                             </a></li>
          <!--   <li> <a href="#"> <i class="icon-mail"></i>Demo
                <div class="badge badge-warning">6 New</div></a></li> -->
          </ul>
        </div>
        <!-- <div class="admin-menu">
          <h5 class="sidenav-heading">Second menu</h5>
          <ul id="side-admin-menu" class="side-menu list-unstyled"> 
            <li> <a href="#"> <i class="icon-screen"> </i>Demo</a></li>
            <li> <a href="#"> <i class="icon-flask"> </i>Demo
                <div class="badge badge-info">Special</div></a></li>
            <li> <a href=""> <i class="icon-flask"> </i>Demo</a></li>
            <li> <a href=""> <i class="icon-picture"> </i>Demo</a></li>
          </ul>
        </div> -->
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span>Liberated Living </span><strong class="text-primary"> Dashboard</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <li class="nav-item"><a href="login.html" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->

       @include('admin.admin_header')

       @yield('content')
      
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
    <!-- Javascript files-->

   
    
    <script src="vendor/popper.js/umd/popper.min.js"> </script>

        <!-- <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script> -->
    <script type="text/javascript" src="{{URL::to('srv/js/admin/js/grasp_mobile_progress_circle-1.0.0.min.js')}}"></script>

    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
   
    
 

  <script   src="http://code.jquery.com/jquery-3.3.1.min.js"   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="   crossorigin="anonymous"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  
  <!-- Main File-->
    <script type="text/javascript" src="{{ URL::to('srv/js/admin/js/front.js') }}"></script>

   <!-- <script src="js/charts-home.js"></script> -->
    <script type="text/javascript" src="{{ URL::to('srv/js/admin/js/charts-home.js') }}"></script>  

    <!-- Upload image preview -->
    <script type="text/javascript" src="{{ URL::to('srv/js/admin/js/imageuploader.js') }}"></script>  

    

  </body>
</html>