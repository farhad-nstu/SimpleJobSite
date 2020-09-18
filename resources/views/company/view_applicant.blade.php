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
          <div class="justify-bold">
            <h4><strong>Name: </strong> {{ $applicant->first_name }} {{ $applicant->last_name }}</h4>
          </div>
          <div class="justify-bold">
            <h5><strong>Email: </strong><strong>{{ $applicant->email }}</strong></h5>
          </div>
          <div class="justify-bold">
            <strong>Applying Date: </strong><span><time datetime="{{ $applicant->created_at}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $applicant->created_at)->format('d-M-y') }}</time></span>
          </div>                 
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection
