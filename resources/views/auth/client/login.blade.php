@extends('layouts.auth')
@section('title')
  {{__('Login Client Panel')}}
@endsection
@section('content')

<form action="{{route('client.login_submit')}}" method="post" class="pt-3 validate-form">
{{--<form action="{{route('login')}}" method="post" class="pt-3 validate-form">--}}
		@csrf
		<div class="form-group @if($errors->has('email')) error-validation @endif">
		  <input type="text" class="form-control form-control-lg" name="email" id="email" placeholder="Email" value="{{old('email')}}" required>
		</div>
		<div class="form-group @if($errors->has('password')) error-validation @endif">
		  <input type="password" class="form-control form-control-lg" name="password" id="password" required placeholder="Password">
		</div>
			
		<div class="mt-3">
		  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit">{{__('Login')}}</button>
		</div>
</form>


@endsection

@section('scripts')
@endsection
