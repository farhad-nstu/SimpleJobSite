@extends('company.layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
	
	<div class="col-md-2">
		@include('company.partials.sidebar')
	</div>

		<div class="col-md-10">
			@include('multiauth::message')
			<div class="card">
				<div class="card-header">{{ __('Register') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('job.update', $job->id) }}" aria-label="{{ __('Register') }}">
						@csrf
						@method('put')

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="title" value="{{ $job->title }}"  autofocus>

								@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name') }}</strong>
										</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

							<div class="col-md-6">
								<textarea class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" autofocus name="description">{{ $job->description }}</textarea>

								@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
												<strong>{{ $errors->first('name') }}</strong>
										</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="salary" value="{{ $job->salary }}" autofocus>

								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="location" value="{{ $job->location }}" autofocus>

								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="country" value="{{ $job->country }}" autofocus>

								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
								@endif
							</div>
						</div>                        

						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __('Save') }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
