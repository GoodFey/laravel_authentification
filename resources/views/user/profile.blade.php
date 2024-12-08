@extends('layouts.main')

@section('title', 'Profile')

@section('content')
    <h2>Profile</h2>

    <div class="row">
        Name: {{ $user->name }}
    </div>
    <div class="row">
        Email: {{ $user->email }}
    </div>
    <div class="row">
        Account verify: {{ \App\Http\Controllers\UserController::isAccountVerify() }}
    </div>

@endsection

