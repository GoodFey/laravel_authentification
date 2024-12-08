@extends('layouts.main')

@section('title', 'Login')

@section('content')

    <div class="col-md-6 offset-md-3">

        @if($errors->any())
            <div class="alert alert-danger">
                Wrong email or password!
            </div>
        @endif

        <form action="{{ route('loginAuth') }}" method="Post">
            @csrf
            <h1 class="h2 mb-3">Login</h1>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password">
            </div>
            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" id="flexCheck" name="remember_me">
                <label class="form-check-label" for="flexCheck">
                    Remember me
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Sign in</button>
        </form>
    </div>

@endsection
