<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts - Authentication</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="auth">
        @if ($errors->any())
            <div class="alert alert--error" id="error-alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button class="alert__close-btn--error" onclick="document.getElementById('error-alert').style.display='none';">&times;</button>
            </div>
        @endif
        
        <div class="auth__blob auth__blob--1"></div>
        <div class="auth__blob auth__blob--2"></div>
        <div class="auth__blob auth__blob--3"></div>

        <div class="auth__container">
            @yield('content')
        </div>
    </div>
</body>
</html>
