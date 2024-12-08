@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class="row">
        <form class="col-md-6 offset-md-3" action="{{ route('user.store') }}" method="Post">
            @csrf
            <div class="mb-3">
                <label for="nameInput" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" name="name"
                       value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput"
                       name="email"
                       value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput"
                       name="password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="passwordConfirmInput" class="form-label">Password Confirm</label>
                <input type="password" class="form-control" id="passwordConfirmInput" name="password_confirmation">
            </div>
            <div class="mb-3">
                <label for="genderSelect" class="form-label">Gender</label>
                <select name="gender" id="genderSelect" class="form-select @error('gender') is-invalid @enderror">
                    <option selected value=""></option>
                    <option value="1">Man</option>
                    <option value="0">Women</option>
                </select>
                @error('gender')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
