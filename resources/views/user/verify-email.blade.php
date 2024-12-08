@extends('layouts.main')

@section('title', 'Login')

@section('content')

    <div class="alert alert-info" role="alert">
        Thank you for registration! To confirm you email verify you email!
    </div>
    <div>
        Didn't get the link?
        <form action="{{ route('verification.send') }}" method="Post">
            @csrf
            <button class="btn btn-link ps-0" type="submit">Send Link</button>
        </form>
    </div>

@endsection

