@extends('applicant.layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-2">
      @include('company.partials.sidebar')
    </div>

    <div class="col-md-10">           
      <div class="accordion" id="accordionExample">
        <div class="card">
          <iframe src="{{ asset($resume) }}" width=”100%” height="1300px;" style="frameborder: none;">
          </iframe>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
