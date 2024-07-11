@extends('layouts.auth')
@section('title')
    {{ trans('Dashboard') }}
@endsection
@section('content')
<!-- partial -->
{{-- <div class="container">
    <div class="row justify-content-center align-items-center " style="height: 70vh;S">
        <div class="col-md-8 col-md-offset-2">

        </div>
    </div>
</div> --}}
<div class="panel panel-default">
    <div class="panel-heading font-weight-bold">OTP</div>
    <hr>
    @if ($errors->any())
        <b style="color: red">{{ $errors->first() }}</b>
    @endif

    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="col-md-12">
                    <select class="form-control" id="carsSelections">
                        <option>Select Options</option>
                        <option>Corolla</option>
                        <option>Mercedes</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- page-body-wrapper ends -->
@endsection

@section('scripts')
<script src="{{ url('public/assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
@endsection
