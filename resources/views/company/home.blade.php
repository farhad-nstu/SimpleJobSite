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
                    <table class="table">
                      <thead>
                        <tr>
                          <td>#</td>
                          <td>Title</td>
                          <td>Email</td>
                          <td>Job  Title</td>
                          <td>Job Creation Date</td>
                          <td>Application Deadline</td>
                          <td>Applying Date</td>
                          <td>Applicant Resume</td>                          
                          <td>Actions</td>
                        </tr>
                      </thead>
                      <tbody>
                      @php($i = 1)
                      @foreach($applicants as $applicant)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>
                            <a href="{{ route('applicant.show', $applicant->id) }}">  
                              {{ $applicant->first_name }} {{ $applicant->last_name }}
                            </a>
                          </td>
                          <td>{{ $applicant->email }}</td>
                          @foreach($jobs as $job)
                            @if($job->id == $applicant->job_id)
                              <td>{{ $job->title }}</td>
                              <td data-title="Date">
														    <time datetime="{{ $job->created_at}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->format('d-M-y') }}</time>
													    </td>
                              <td data-title="Date">
														    <time datetime="{{ $job->deadline}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->deadline)->format('d-M-y') }}</time>
													    </td>
                            @endif
                          @endforeach
                          <td data-title="Date">
														<time datetime="{{ $applicant->created_at}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $applicant->created_at)->format('d-M-y') }}</time>
													</td>
                          <td>
                            <a class="btn btn-sm btn-success" href="{{ route('view.applicant.resume', $applicant->id) }}">View Resume</a>
                          </td>
                          <td>
                            <a class="btn btn-sm btn-success my-1" href="{{ route('applicant.show', $applicant->id) }}"><span class="fa fa-eye"></span></a>

                            <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $applicant->id }}').submit();" ><span class="fa fa-trash"></span></a>

                        <form id="delete-form-{{ $applicant->id }}" action="{{ route('applicant.destroy',$applicant->id) }}" method="POST" style="display: none;">
                            @csrf @method('delete')
                        </form> 

                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                    <div class="text-center">
                      {{ $applicants->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
