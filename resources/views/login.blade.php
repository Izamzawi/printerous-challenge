@extends('app')

@section('content')

<div class="container user-form">
    <div class="row">
        <div class="col-sm-4 offset-sm-4">
            <form action="login" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-success">Log In</button>
            </form>
        </div>
    </div>
</div>

@endsection