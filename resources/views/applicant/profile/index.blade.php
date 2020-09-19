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
									<h5><strong>Name: </strong> {{ $applicant->first_name }} {{ $applicant->last_name }}</h5>
								</div>
								<div class="justify-bold">
									<h5><strong>Email: </strong><strong>{{ $applicant->email }}</strong></h5>
								</div>
								<div class="justify-bold">
									<p><strong>Skill: </strong>{{ $applicant->skill }}</p>
								</div>
								<div data-title="Photo">
									@if($extension == "pdf")
										<iframe src="{{ asset($applicant->resume)  }}" width=”100%” height=”100%”>
										</iframe>
									@elseif($extension == "docs")
									<a class="btn btn-sm btn-success word" href="http://docs.google.com/gview?url={{$applicant->resume}}">View</a>
									@endif									
								</div>
								<div >
									<a class="btn btn-sm btn-success my-2" href="{{ route('profile.edit', $applicant->id) }}">Update Profile</a>
									@if($applicant->resume)
										<a class="btn btn-sm btn-success my-2" href="{{ route('view.file', $applicant->id) }}">View Resume</a>
									@endif
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
<!-- <script>
	$(document).ready(function() {
 $(".word").fancybox({
  'width': 600, // or whatever
  'height': 320,
  'type': 'iframe'
 });
});
</script> -->
