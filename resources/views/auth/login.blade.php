<form action="{{ url('/login') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
@if($errors->has('loginError'))
    <p>{{ $errors->first('loginError') }}</p>
@endif
