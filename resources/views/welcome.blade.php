@extends('layouts.app')
@section('content')

<div class="jumbotron p-2 mb-4 rounded-3 jumbotron-welcome">
    <div class="container py-5 welcome-container">
        <div class="logo_laravel">
            <img src="{{Vite::asset('resources/img/Logo2.png')}}" alt="Boolivery-logo">
        </div>
        <h1 class="display-5 fw-bold mt-3">
            Welcome in Boolivery, Restaurant Owner!
        </h1>

        <p class="col-md-8 fs-4">Welcome to your dedicated administrative portal. Here, you have full control over your restaurant, menus, and orders. Take charge of your culinary journey with ease and efficiency.</p>

        <a href="{{ url('admin') }}" class="btn btn-primary btn-lg mt-5 my_btn" type="button">Join Your Portal</a>

        <a href="http://localhost:5173" class="btn btn-primary btn-lg mt-5 my_btn">Back to Homepage</a>
    </div>
</div>
@endsection