<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function register()
    {
        return view('Auth.register');
    }
    public function SaveRegister(Request $request)
    {
        // Validate the request data
        $request->validate(
            [
                'username' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:6',
                'password_confirmation' => 'required|same:password',
            ],
            [
                'username.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email address',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 6 characters',
                'password_confirmation.required' => 'Password confirmation is required',
                'password_confirmation.same' => 'Password confirmation must match password',
            ]
        );
        // Save the user to the database
        User::create($request->all());
        return redirect()->route('auth.login');
    }


    public function login()
    {
        return view('Auth.login');
    }
    public function LoginAuth(Request $request)
    {
        // Validate the request data
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'Email is required',
                'email.email' => 'Email must be a valid email address',
                'password.required' => 'Password is required',
                'password.min' => 'Password must be at least 6 characters',
            ]
        );
        // Attempt to log the user in
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('home');
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
