@extends('app')

@section('content')

<div class="my-2">
  @if(Session::get('user')['role_id'] == 1)
  <a href="/register" class="btn btn-warning">Register Account Manager</a>
  @elseif(Session::get('user')['role_id'] == 2)
  <a href="/create" class="btn btn-warning">Create Organization</a>
  @endif
</div>

<div class="card-deck my-4">
  @if($orgs)
  <div class="card">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  @else
  <div>No data</div>
  @endif
</div>

@endsection