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
        <div class="card-header">{{ __('Register') }} 
            <a class="btn btn-sm btn-success" href="{{ route('job.create') }}" style="margin-left: 70px;">Add New </a>
        </div>

        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <td>#</td>
                <td>Title</td>
                <td>Description</td>
                <td>Salary</td>
                <td>Location</td>
                <td>Creation Time</td>
                <td>Deadline</td>
                <td>Actions</td>
              </tr>
            </thead>
            <tbody>
            @php($i = 1)
            @foreach($jobs as $job)
              <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->description }}</td>
                <td>{{ $job->salary }}</td>
                <td>{{ $job->location }}</td>
                <td data-title="Date">
                  <time datetime="{{ $job->created_at}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->created_at)->format('d-M-y') }}</time>
                </td>
                <td data-title="Date">
                  <time datetime="{{ $job->deadline}}">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $job->deadline)->format('d-M-y') }}</time>
                </td>
                <td>
                  <a class="btn btn-sm btn-success" href="{{ route('job.edit', $job->id) }}"><span class="fa fa-edit"></span></a>

                  <a href="#" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $job->id }}').submit();" ><span class="fa fa-trash"></span></a>

                  <form id="delete-form-{{ $job->id }}" action="{{ route('job.destroy',$job->id) }}" method="POST" style="display: none;">
                      @csrf @method('delete')
                  </form>
                </td>

              </tr>
            @endforeach
            </tbody>
          </table>
          <div class="text-center">
            {{ $jobs->links() }}
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
@endsection
