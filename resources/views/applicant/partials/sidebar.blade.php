<ul class="list-group">
  <li class="list-group-item">
    <a href="{{ route('applicant.dashboard') }}">Home</a>
  </li>
  <li class="list-group-item">
    <a href="{{ route('profile.index',Auth::guard('applicant')->user()->id) }}">profile</a>
  </li>
</ul>