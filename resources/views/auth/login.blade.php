@extends('layouts.auth')

@section('content')
    <div class="auth__form">
        <h2 class="auth__title">Login</h2>
        <form action="{{ url('/login') }}" method="POST">
            @csrf
            <input type="email" name="email" placeholder="Email" class="auth__input" required>
            <input type="password" name="password" placeholder="Password" class="auth__input" required>
            <button type="submit" class="auth__button">Login</button>
        </form>
        <p class="auth__message">
            Don't have an account? <a href="{{ url('/register') }}" class="auth__link">Register</a>
        </p>
    </div>
@endsection
