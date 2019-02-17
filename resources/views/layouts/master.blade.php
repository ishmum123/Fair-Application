<!DOCTYPE html>
<html lang="en">

<head>
  @include('layouts.include.header')

</head>


<body class="nav-md">

  <div class="container body">


    <div class="main_container">

      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">

          <div class="navbar nav_title" style="border: 0;">
            <a href="/dashboard" class="site_title"><i class="fa fa-paw"></i> <span>মেলা</span></a>
          </div>
          <div class="clearfix"></div>

          <!-- menu prile quick myInfo -->
        @include('layouts.include.menu-prile')
        <!-- /menu prile quick myInfo -->

          <br />

          <!-- sidebar menu -->
        @include('layouts.include.sidebar')
        <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
        @include('layouts.include.sidebar-footer')
        <!-- /menu footer buttons -->
        </div>
      </div>

        <!-- top navigation -->
      @include('layouts.include.topnavigation')
      <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

        @yield('content')

        <!-- footer content -->

        @include('layouts.include.footer')
        <!-- /footer content -->
        </div>
        <!-- /page content -->

    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>

  @include('layouts.include.script')

  <!-- /datepicker -->
  <!-- /footer content -->
</body>

</html>
