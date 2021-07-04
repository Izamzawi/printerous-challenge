@extends('app')

@section('content')
<div class="row card" style="width: 18rem;">
    <img src="{{ asset('logos/' . $org->logo) }}" class="card-img-top" alt="...">
    <div class="card-body">
		<h5 class="card-title">{{ $org->name }}</h5>
		<p class="card-text"><small class="text-muted">{{ $org->phone }}</small></p>
		<p class="card-text"><small class="text-muted">{{ $org->email }}</small></p>
		<p class="card-text"><small class="text-muted">{{ $org->website }}</small></p>
		@if(Session::get('user')['role_id'] == 2)
		<p class="card-text">
			<a href="#" class="btn btn-primary">Edit</a>
			<a href="#" class="btn btn-primary">Delete</a>
		</p>
		@endif
    </div>
</div>


<h3>List of Person</h3>	
@if(Session::get('user')['role_id'] == 2)
<a href="#" class="btn btn-primary my-3">Add Person</a>
@endif
<div class="row">	
	@if($people->count() > 0)
	@foreach($people as $person)
	<div class="card mx-1 mb-2" style="width: 15rem;">
		<img src="{{ asset('avatars/' . $org->avatar) }}" class="card-img-top" alt="...">
		<div class="card-body">
			<h5 class="card-title">{{ $org->name }}</h5>
			<p class="card-text"><small class="text-muted">{{ $org->phone }}</small></p>
			<p class="card-text"><small class="text-muted">{{ $org->email }}</small></p>
			@if(Session::get('user')['role_id'] == 2)
			<p class="card-text">
				<a href="#" class="btn btn-primary">Edit</a>
				<a href="#" class="btn btn-primary">Delete</a>
			</p>
			@endif
		</div>
	</div>
	@endforeach
	@else
	<div>No person data found</div>
	@endif
</div>

@endsection