<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <div class="navbar__container">
            <a class="navbar__brand" href="{{ route('contacts.index') }}">Contacts</a>
        </div>
    </nav>

    <main class="main-container">
        @if(session('success'))
            <div class="alert alert--success" id="success-alert">
                {{ session('success') }}
                <button class="alert__close-btn" onclick="document.getElementById('success-alert').style.display='none';">x</button>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>
