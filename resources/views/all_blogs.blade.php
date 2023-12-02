@extends('layouts.public_app')

@section('content')
    <div class="container-fluid">
        <h1 class="text-black-50">You are logged in!</h1>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="icheck-primary">
                <a href="{{ route('login') }}" class="text-center">Login</a>
            </div>
        </div>
    </div>
@endsection
