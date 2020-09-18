@extends('applicant.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-2">
				@include('applicant.partials.sidebar')   
    	</div>

			<div class="col-md-10">
				@include('multiauth::message')
				<div class="card">
					<div class="card-header">{{ __('Register') }}</div>

							<div class="card-body">
								<form method="POST" action="{{ route('profile.update',Auth::guard('applicant')->user()->id) }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
										@csrf
										@method('PUT')

										<div class="form-group row">
												<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>

												<div class="col-md-6">
												<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="first_name" value=" {{ Auth::guard('applicant')->user()->first_name }}" autofocus>

														@if ($errors->has('name'))
																<span class="invalid-feedback" role="alert">
																		<strong>{{ $errors->first('name') }}</strong>
																</span>
														@endif
												</div>
										</div>

											<div class="form-group row">
												<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

												<div class="col-md-6">
														<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="last_name"  value="{{ Auth::guard('applicant')->user()->last_name }}" autofocus>

														@if ($errors->has('name'))
																<span class="invalid-feedback" role="alert">
																		<strong>{{ $errors->first('name') }}</strong>
																</span>
														@endif
												</div>
										</div>

									<div class="form-group row">
										<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Skills') }}</label>

										<div class="col-md-6">
										<input id="name" type="text" class="form-control" name="skill" autofocus  value="{{ Auth::guard('applicant')->user()->skill }}">

												@if ($errors->has('name'))
														<span class="invalid-feedback" role="alert">
																<strong>{{ $errors->first('name') }}</strong>
														</span>
												@endif
										</div>
								</div>

										<div class="form-group row">
											<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Upload Image') }}</label>

											<div class="col-md-6">
													<input id="name" type="file" class="form-control" name="image"   autofocus  ><br>
													<input type="" name="" class="form-control" value="{{ Auth::guard('applicant')->user()->image }}">

													@if ($errors->has('name'))
															<span class="invalid-feedback" role="alert">
																	<strong>{{ $errors->first('name') }}</strong>
															</span>
													@endif
											</div>
									</div>

						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Upload Resume') }}</label>
							<div class="col-md-6">
								<input id="name" type="file" class="form-control" name="resume" autofocus  value="{{ Auth::guard('applicant')->user()->resume }}"><br>
								<input type="" name="" class="form-control" value="{{ Auth::guard('applicant')->user()->resume }}">

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
