<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacts App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

</head>
<body>
    <nav class="navbar">
        <div class="navbar__container">
            <a class="navbar__brand" href="{{ route('contacts.index') }}">Contacts</a>
                @if(auth()->check())
                    <a href="{{ route('logout') }}" 
                        class="navbar__link" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span>Logout</span>
                    </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endif
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
