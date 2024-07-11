
<!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{$info['name']}} | @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->

  @yield('css')

  <link rel="stylesheet" href="{{url('assets/css/admin-panel/style.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/admin-panel/bootstrap-switch-metro.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />

  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{url('assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
  <link rel="stylesheet" href="{{url('assets/vendors/jquery-toast-plugin/jquery.toast.min.css')}}" />

  <link rel="stylesheet" href="{{url('assets/css/admin-panel/custom-black.css?v=1.1')}}">

@stack('css')


