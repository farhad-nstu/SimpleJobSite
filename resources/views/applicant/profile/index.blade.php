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
						<div class="row">
							<div class="col-md-8">
								<div class="justify-bold">
									<h4><strong>Name: </strong> {{ $applicant->first_name }} {{ $applicant->last_name }}</h4>
								</div>
								<div class="justify-bold">
									<h5><strong>Email: </strong><strong>{{ $applicant->email }}</strong></h5>
								</div>
								<div class="justify-bold">
									<strong>Applying Date: </strong><span><time datetime="{{ $applicant->created_at}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $applicant->created_at)->format('d-M-y') }}</time></span>
								</div>
								<div class="justify-bold">
									<p><strong>Skill: </strong>{{ $applicant->skill }}</p>
								</div>
								<div data-title="Photo">
									<!-- <iframe src="{{ asset($applicant->resume)  }}" width=”100%” height=”100%”>
									</iframe> -->
									<embed src="{{ asset($applicant->resume) }}" width=”100%” height=”100%” frameborder="0">
									
								</div>
								<div >
									<a class="btn btn-sm btn-success p-1 m-2" href="{{ route('profile.edit', $applicant->id) }}">Update Profile</a>
								</div>
							</div>

						<div class="col-md-4">
							<div data-title="Photo">
								@if($applicant->image)
									<img style="height: 150px; width: 150px;" src="{{asset($applicant->image)}}">
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
