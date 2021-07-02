@extends('app')

@section('content')

<div class="container user-form">
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <p>Create New Organization</p>
            <form action="/store" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Company name">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Company email">
                </div>
                <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Company phone number">
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload Avatar</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="logo">
                        <label class="custom-file-label" for="logo">Choose file</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value={{ Session::get('user')['id'] }}>
                </div>
                <button type="submit" class="btn btn-info">Create</button>
            </form>
        </div>
    </div>
</div>

@endsection