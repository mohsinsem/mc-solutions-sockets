
<!-- Required meta tags -->

  <title> {{@$info['name']}} | @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/font-awesome/css/font-awesome.min.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->

  @yield('css')

  <link rel="stylesheet" href="{{url('assets/css/client-panel/style.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/client-panel/custom.css?v=1.2')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />

  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{url('assets/vendors/jquery-toast-plugin/jquery.toast.min.css')}}" />
@stack('css')


