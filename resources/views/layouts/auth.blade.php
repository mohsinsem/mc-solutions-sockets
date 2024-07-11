
<!DOCTYPE html>
<html lang="en">
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf_token" content="{{ csrf_token() }}" />

	<title>{{$info['name']}} | @yield('title')</title>
	<!-- plugins:css -->
	<link rel="stylesheet" href="{{url('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
	<link rel="stylesheet" href="{{url('assets/vendors/css/vendor.bundle.base.css')}}">
 
    <link rel="stylesheet" href="{{url('assets/css/admin-panel/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{url('assets/images/favicon.png')}}" />
  
    <link rel="stylesheet" href="{{ url('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
	
	<link rel="stylesheet" href="{{ url('assets/plugins/intl-tel-input-master/build/css/intlTelInput.css') }}" />
    <link rel="stylesheet" href="{{ url('assets/plugins/intl-tel-input-master/build/css/demo.css') }}" />
    @vite('./resources/js/app.js')
	<style>
		.select2-container .select2-selection--single{
			height: 50px;
		}
		.select2-container--default .select2-selection--single .select2-selection__arrow{
			height: 50px;
		}
		.select2-container--default .select2-selection--single .select2-selection__rendered {
			color: #cbc8c8;
			line-height: 23px;
		}
		.select2-container--default .select2-selection--single{
			border: 1px solid #d2c9c954;
		}
		.banner {
			background-image: url('{{url('assets/images/login-banner.jpg')}}');
			
			width: 100%;
			height: 100%;
			background-size: 74% 80% !important;
			background-position: left;
			margin-top: 6%;
			background-repeat: no-repeat !important;
			background-color: #000;
		}
		body{
			margin: 0px;
			background: #fff;
		}
		.auth .auth-form-light {
			background: #ffffff;
			box-shadow: 0px 0px 10px rgb(215 166 3);
			border: 7px solid #fffdd6;
		}
	</style>
</head>
<body>


<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0 banner">
        <div class="row w-100 mx-0">
			<div class="col-lg-8 mx-auto">
            <div class="auth-form-light text-left py-1 px-4 px-sm-5">
              <div class="brand-logo">
			  @if (isset($record))
					<img class="" src="@if (isset($record)) {{ url('uploads/') }}/{{ $record['LogoPath'] }} @endif" alt="Logo">
			  @endif	
              </div>
              <h4>Sign in to continue</h4>
              <h6 class="font-weight-light"></h6>
			  	@include('partials.validation_errors')

				@yield('content')

                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">

                    </label>
                  </div>
                  {{-- <a href="#" class="auth-link text-black">Forgot password?</a> --}}
                </div>
                <div class="mb-2">

                </div>
                <div class="text-center mt-4 font-weight-light">
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
	<!-- jQuery -->
    <script src="{{url('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
	<script src="{{url('assets/js/off-canvas.js')}}"></script>
	<script src="{{url('assets/js/hoverable-collapse.js')}}"></script>
	<script src="{{url('assets/js/template.js')}}"></script>
	<script src="{{url('assets/js/settings.js')}}"></script>
	<script src="{{url('assets/js/todolist.js')}}"></script>

	<!-- plugins:js -->
	<!-- endinject -->
	<!-- Plugin js for this page -->
	<script src="{{ url('assets/vendors/chart.js/Chart.min.js') }}"></script>
	<script src="{{ url('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
	<!-- End plugin js for this page -->
	<!-- Custom js for this page-->
	<script src="{{ url('assets/js/dashboard.js') }}"></script>
	<script src="{{ url('assets/js/bootstrap-switch.min.js') }}"></script>
	<script src="{{ url('assets/js/tooltips.js') }}"></script>
	<script src="{{ url('assets/vendors/jquery-toast-plugin/jquery.toast.min.js') }}"></script>


<!-- End custom js for this page-->
{{-- sweetalert2 --}}
<script src="{{ url('assets/js/sweetalert.js') }}"></script>
{{-- End sweetalert2 --}}
<!-- Url for ajax -->
    <script>
        var translations = `{!! session('trans') !!}`;
        function trans(key) {
			var trans = JSON.parse(translations);
			return (trans[key] != null ? trans[key] : key);
		}
    </script>

<script src="{{ url('assets/js/admin/custom.js?v=1.112') }}"></script>
	@yield('scripts')

</body>
</html>
