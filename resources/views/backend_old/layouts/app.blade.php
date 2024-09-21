<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentelella Alela! | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('backend/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('backend/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('backend/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('backend/build/css/custom.min.css') }}" rel="stylesheet">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/toastr/toastr.css')}}">
  </head>

  <body class="nav-md">

    <div class="container body">
        <div class="main_container">
  
          {{-- @auth --}}
              <div class="col-md-3 left_col">
                  <div class="left_col scroll-view">
                  
                 @include('backend.layouts.partial.sidebar')
                  <!-- /menu footer buttons -->
                  @include('backend.layouts.partial.footer')
                  <!-- /menu footer buttons -->
                  </div>
              </div>
              <!-- top navigation -->
              @include('backend.layouts.partial.topbar')
              <!-- /top navigation -->
          {{-- @endauth --}}
          
  
          <!-- page content -->
         @yield('content')
          <!-- /page content -->
  
        </div>
      </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/vendors/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend/vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('backend/vendors/fastclick/lib/fastclick.js') }}"></script>
    <!-- NProgress -->
    <script src="{{ asset('backend/vendors/nprogress/nprogress.js') }}"></script>
    <!-- Chart.js -->
    <script src="{{ asset('backend/vendors/Chart.js/dist/Chart.min.js') }}"></script>
    <!-- jQuery Sparklines -->
    <script src="{{ asset('backend/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
    <!-- Flot -->
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.stack.js') }}"></script>
    <script src="{{ asset('backend/vendors/Flot/jquery.flot.resize.js') }}"></script>
    <!-- Flot plugins -->
    <script src="{{ asset('backend/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
    <script src="{{ asset('backend/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/flot.curvedlines/curvedLines.js') }}"></script>
    <!-- DateJS -->
    <script src="{{ asset('backend/vendors/DateJS/build/date.js') }}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{ asset('backend/vendors/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{ asset('backend/build/js/custom.min.js') }}"></script>

    <!-- Sweet alert init js-->
  <script src="{{ asset('backend/dist/js/pages/sweet-alerts.init.js') }}"></script>

  {{-- Sweet Alert --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="{{ asset('backend/dist/js/code.js') }}"></script>



    <script src="{{ asset('backend/plugins/toastr/toastr.min.js') }}"></script>
<script>
	@if (Session::has('messege'))
	var type="{{Session::get('alert-type','info')}}"
	switch(type){
		case 'info':
			toastr.info("{{ Session::get('messege') }}");
			break;
		case 'success':
			toastr.success("{{ Session::get('messege') }}");
			break;
		case 'warning':
			toastr.warning("{{ Session::get('messege') }}");
			break;
		case 'error':
			toastr.error("{{ Session::get('messege') }}");
			break;
	}   
	@endif
  </script>

    
  </body>
</html>