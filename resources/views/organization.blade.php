@extends('app')

@section('content')

<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    @if(Session::get('user')['role_id'] == 2)
    <a href="#" class="btn btn-primary">Edit</a>
    <a href="#" class="btn btn-primary">Delete</a>
    @endif
  </div>
</div>

@if(Session::get('user')['role_id'] == 2)
    <a href="#" class="btn btn-primary">Add Person</a>
@endif


<div class="row">
    <div class="media">
    <img src="..." class="mr-3" alt="...">
    <div class="media-body">
        <h5 class="mt-0">Media heading</h5>
        <p>Will you do the same for me? It's time to face the music I'm no longer your muse. Heard it's beautiful, be the judge and my girls gonna take a vote. I can feel a phoenix inside of me. Heaven is jealous of our love, angels are crying from up above. Yeah, you take me to utopia.</p>
    </div>
    </div>
    @if(Session::get('user')['role_id'] == 2)
    <a href="#" class="btn btn-primary">Edit</a>
    <a href="#" class="btn btn-primary">Delete</a>
    @endif
</div>

@endsection