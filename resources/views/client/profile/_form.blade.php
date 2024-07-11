

<fieldset class="form-group">
    <legend class="col-form-label">{{ trans('Sockets Task') }}:</legend>
    
	<div class="row">
	
		<div class="col-md-6">
			<div class="form-group @if ($errors->has('carId')) error-validation @endif">
				<select class="form-control form-control-lg" id="carId" required name="carId"   >
					<option value="" >{{ trans('Select Car') }} *</option>

					@foreach ($cars as $single)
						<option {{ old('carId') == $single->CarId ? 'selected' : '' }} value=" {{  $single->CarId }}" >{{ $single->Name }}</option>
					@endforeach
				</select>
			</div>
		</div>

		
		<div class="col-md-6">
			<div class="form-group @if ($errors->has('carOptId')) error-validation @endif">
				<select class="form-control form-control-lg" id="carOptId" name="carOptId[]" required multiple>
					<option value="" >{{ trans('Select Car Models') }} *</option>

				</select>
			</div>
		</div>

		@if($customerCars)
		<table class="table" id="addRows">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Car</th>
				<th scope="col">Model</th>
				</tr>
			</thead>
			<tbody>
				
				@foreach($customerCars as $key => $single)

					@if(isset($single['Name']) && $single['Name'] != '')
					<tr>
						<th scope="row">{{$key+1}}</th>
						<td>{{$single['CarName']}}</td>
						<td>{{$single['Name']}}</td>
					</tr>
					@endif
				@endforeach
			</tbody>
			</table>

		@endif
		
    </div>
   
</fieldset>


