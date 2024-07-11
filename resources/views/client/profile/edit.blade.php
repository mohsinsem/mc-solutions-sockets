@extends('layouts.client_app')
@section('title')
    {{ trans('Profile') }}
@endsection
@section('css')

    <link rel="stylesheet" href="{{ url('assets/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    
    <style>
    .select2-container {
        border: 1px solid #dfdfdf;
        height: 49px;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        background: #2258bf !important;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
        padding: 9px !important;
        font-size: .725rem !important;
}
    </style>
@endsection
@section('content')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                       {{--profile form start--}}
                                       <form action="{{ route('client.profile.update') }}" method="post" class="pt-3 validate-form" id="form">
                                           @csrf
                                            @include('client.profile._form')
                                            <div class="mt-3">
                                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">{{trans('SAVE')}}</button>
                                            </div>
                                       </form>
                                       {{--profile form end--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        var routeName = '{{ route('client.load-car-options') }}';
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script src="{{ url('assets/vendors/select2/select2.min.js') }}"></script>
<script src="{{ url('assets/js/select2.js') }}"></script>

<script src="{{ url('assets/js/client/profile.js') }}"></script>

@endsection
