@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <div class="container text-center mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h1 class="display-4 mb-4">Welcome to the Admin Panel</h1>
                <p class="lead">Only admin users are allowed to log in.</p>
                <p class="text-muted mb-4">Please ensure you have the appropriate credentials before proceeding.</p>
                <a href="{{ route('login') }}" class="btn btn-primary btn-lg px-4">Login as Admin</a>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: #f8f9fa; /* Light background color */
        }
        .card {
            border-radius: 1rem; /* Rounded corners for the card */
        }
        .btn-primary {
            background-color: #FF8500; /* Custom primary color */
            border-color: #FF8500; /* Custom border color */
        }
        .btn-primary:hover {
            background-color: #e67e22; /* Darker shade on hover */
            border-color: #e67e22; /* Darker shade on hover */
        }
    </style>
@endsection
