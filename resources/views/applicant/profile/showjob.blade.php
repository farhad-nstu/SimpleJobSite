@extends('applicant.layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-2">
      @include('applicant.partials.sidebar')
    </div>

    <div class="col-md-10">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h4 class="mb-0">
            Toogle job title to view Description
          </h4>
        </div>
      </div>             

      <div class="accordion" id="accordionExample">
        @foreach($jobs as $job)
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn" type="button" data-toggle="collapse" data-target="#collapse-{{ $job->id }}" aria-expanded="false" aria-controls="collapseOne">
              {{ $job->title }}
              </button>

              <a class="float-right btn btn-primary" href="{{ route('job.apply', ['user_id' => Auth::guard('applicant')->user()->id, 'job_id' => $job->id] ) }}" type="button">Apply</a>

            </h2>
          </div>

          <div id="collapse-{{ $job->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
              <h4> Job description:</h4> {{ $job->description }}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
