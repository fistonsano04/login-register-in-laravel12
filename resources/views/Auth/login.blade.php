@extends('layouts.auth')
@section('content')
    <div class="form-container">
        <h2>Login</h2>
        <form id="loginForm" method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <div class="form-group">
                <input type="email" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required>
                <div class="error" id="emailError">Valid email is required</div>
            </div>
            <div class="form-group">
                <input type="password" id="password" placeholder="Password" name="password" required>
                <div class="error" id="passwordError">Password is required</div>
            </div>
            <p>if you don't have account sign up <span class="here"><a href="{{ route('auth.register') }}">
                        here</a></span></p>
            <button type="submit" class="btn">Login</button>

        </form>
    </div>
@endsection
