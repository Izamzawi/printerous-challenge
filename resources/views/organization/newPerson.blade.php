@extends('app')

@section('content')

<div class="container user-form">
    <div class="row">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <p>Add new person in charge</p>
            <form action="/newPerson" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Person name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Person email">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Person phone number">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Avatar</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="avatar">
                        <label class="custom-file-label" for="avatar">Choose file</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-info">Add Person</button>
            </form>
        </div>
    </div>
</div>

@endsection