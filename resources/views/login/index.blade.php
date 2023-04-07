@extends('layout.main')

@section('container')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h1 class="h3 mb-3 font-weight-normal text-center">Please Login</h1>
            @if (session('loginError'))
                <div class="alert alert-danger">
                    {{ session('loginError') }}
                </div>
            @endif
            @if (session('isRegistered'))
                <div class="alert alert-success">
                    {{ session('isRegistered') }}
                </div>
            @endif
            <form class="form-signin" action="/login" method="post">
                @csrf
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" value="{{ old('email') }}" autofocus>
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <input type="password" name="password" class="form-control" placeholder="Password">
                <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Login</button>
            </form>
            <small class="d-block text-center mt-2">Not Registered? <a href="/register">Register Now!</a></small>
        </div>
    </div>
</div>
@endsection