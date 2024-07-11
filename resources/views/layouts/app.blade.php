<!DOCTYPE html>
<html lang="en">

<head>
@include('partials.head')
  @vite('./resources/js/app.js')
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('partials.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      @include('partials.sidebar')
      <!-- partial -->
      <div class="main-panel">
        @include('partials.validation_errors')
          @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('partials.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  @include('partials.scripts')

  @yield('scripts')

</body>

</html>

