@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>  <i class="mdi mdi-alert-circle mr-1"></i> {{__('Failed')}}! {{ $error }} </li>
			@endforeach
		</ul>
	</div>
@endif

@if(session()->has('success'))
	<div class="alert alert-success">
		<i class="mdi mdi-checkbox-marked-circle mr-1"></i> {{__('Success')}}! {{session()->get('success')}}
	</div>
@endif

@if(session()->has('failed'))
	<div class="alert alert-danger">
		<i class="mdi mdi-alert-circle mr-1"></i> {{__('Failed')}}! {{session()->get('failed')}}
	</div>
@endif

@if(session()->has('info'))
	<div class="alert alert-info">
		<i class="mdi mdi-alert-circle mr-1"></i> {!! htmlspecialchars_decode(session()->get('info')) !!} 
	</div>
@endif


@if(session()->has('instructions'))
	<div class="alert alert-info" style="background-color: #f3f3f391 !important;">
		<i class="mdi mdi-alert-circle mr-1"></i> {!! htmlspecialchars_decode(session()->get('instructions')) !!} 
	</div>
@endif

