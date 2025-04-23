@extends('layouts.auth')
@section('content')
    <div class="form-container">
        <h2>Register</h2>
        <form id="registerForm" method="POST" action="{{ route('register.save') }}">
            @csrf
            <input type="text" id="username" placeholder="Username" name="username" value="{{ old('username') }}" required>
            <div class="error" id="usernameError">Username is required</div>
            <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
            <div class="error" id="emailError">Valid email is required</div>
            <input type="password" id="password" placeholder="Password" name="password" value="{{ old('password') }}" required>
            <input type="password" id="re-password" placeholder="repeat Password" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
            <div class="error" id="passwordError">Password must be at least 6 characters</div>
            <p>Login <span class="here"><a href="{{ route('auth.login') }}">
                here</a></span></p>
            <button type="submit">Register</button>
        </form>
    </div>
@endsection
