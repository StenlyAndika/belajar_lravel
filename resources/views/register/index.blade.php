@extends('layout.main')

@section('container')
<div class="container mt-3">
    <div class="row">
        <div class="col-lg-4">
            <h1 class="h3 mb-3 font-weight-normal text-center">Please Register</h1>
            <form class="form-registration" action="/register" method="post">
                @csrf
                <input type="text" class="form-control rounded-top" name="name" placeholder="Name" autofocus>
                <input type="email" class="form-control" name="email" placeholder="Email address">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <input type="password" class="form-control rounded-bottom" name="password" placeholder="Password">
                <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-2">Already Registered? <a href="/login">Login Now!</a></small>
        </div>
    </div>
</div>
@endsection