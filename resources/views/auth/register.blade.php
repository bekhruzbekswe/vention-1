@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="auth__form">
    <h2 class="auth__title">Register</h2>
    <form action="{{ url('/register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Name" class="auth__input" required>
        <input type="email" name="email" placeholder="Email" class="auth__input" required>
        

        <div class="auth__input-group">
            <input type="password" name="password" placeholder="Password" class="auth__input auth__input--inline" required>
            <input type="password" name="password_confirmation" placeholder="Confirm Password" class="auth__input auth__input--inline" required>
        </div>
        
        <button type="submit" class="auth__button">Register</button>
    </form>
    <p class="auth__message">
        Already have an account? <a href="{{ url('/login') }}" class="auth__link">Login</a>
    </p>
</div>
@endsection
