	@stack('js')

<!-- plugins:js -->
{{--<script src="{{ url('assets/vendors/js/vendor.bundle.base.js') }}"></script>--}}
<!-- endinject -->
<!-- Plugin js for this page -->
{{--<script src="{{ url('assets/vendors/chart.js/Chart.min.js') }}"></script>--}}
{{--<script src="{{ url('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>--}}
<!-- End plugin js for this page -->
<!-- inject:js -->
{{--<script src="{{ url('assets/js/off-canvas.js') }}"></script>--}}
{{--<script src="{{ url('assets/js/hoverable-collapse.js') }}"></script>--}}
{{--<script src="{{ url('assets/js/template.js') }}"></script>--}}
{{--<script src="{{ url('assets/js/settings.js') }}"></script>--}}
{{--<script src="{{ url('assets/js/todolist.js') }}"></script>--}}
<!-- endinject -->
<!-- Custom js for this page-->
<!--
{{--<script src="{{ url('assets/js/dashboard.js') }}"></script>--}}
-->
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
	var db_url = "{{$info['website']}}/admin/"
    // adminurl
	var baseurl = "{{$info['website']}}/"
	var currency = " USD";
</script>

<script src="{{ url('assets/js/admin/custom.js?v=1.112') }}"></script>

