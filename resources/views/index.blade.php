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
	@foreach($orgs as $org)
	<div class="card">
		<img src="{{ asset('logos/' . $org->logo) }}" class="card-img-top" alt="...">
		<div class="card-body">
			<h5 class="card-title"><a href="/organization/{{$org->id}}">{{$org->name}}</a></h5>
			<p class="card-text"><small class="text-muted">{{$org->phone}}</small></p>
			<p class="card-text"><small class="text-muted">{{$org->email}}</small></p>
			<p class="card-text"><small class="text-muted">{{$org->website}}</small></p>
		</div>
	</div>
	@endforeach
	@else
	<div>No data</div>
	@endif
</div>

@endsection