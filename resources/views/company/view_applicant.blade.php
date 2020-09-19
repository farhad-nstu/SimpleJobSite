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
        <div class="card-body">
          <div class="row">

            <div class="col-md-8"> 
              <div class="justify-bold">
                <h5><strong>Name: </strong> {{ $applicant->first_name }} {{ $applicant->last_name }}</h5>
              </div>
              <div class="justify-bold">
                <h5><strong>Email: </strong><strong>{{ $applicant->email }}</strong></h5>
              </div>

              @foreach($jobs as $job)
                @if($job->id == $applicant->job_id)
                  <h5><strong>Job Title: </strong><strong>{{ $job->title }}</strong></h5>
                  
                  <strong>Job Creation Date: </strong><span><time datetime="{{ $job->created_at}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->format('d-M-y') }}</time></span>
                  <br>
                  <strong>Application Deadline: </strong><span><time datetime="{{ $job->deadline}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->deadline)->format('d-M-y') }}</time></span>
                @endif
              @endforeach

              <div class="justify-bold">
                <strong>Applying Date: </strong><span><time datetime="{{ $applicant->created_at}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $applicant->created_at)->format('d-M-y') }}</time></span>
              </div> 
              <hr>
              <div class="justify-bold py-2">
                <a class="btn btn-sm btn-success" href="{{ route('view.applicant.resume', $applicant->id) }}">View Resume</a>
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
