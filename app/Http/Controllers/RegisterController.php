<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view("register.create");
    }

    public function store(Request $request)
    {
        $myvalues = $request->validate([
            'username' => ['required', 'alpha_dash', 'min:2', 'max:20', 'unique:users'],
            'name' => ['required', 'string', 'min:1', 'max:24'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:6', 'max:28', Password::min(8)->mixedCase()->numbers()->symbols(), 'not_regex:/[\n\s]/']
        ]);

        $user = User::create($myvalues);
        // Sign in the registered user;
        Auth::login($user);
        return redirect('/')->with("success", "your account is created successfully");
    }
}
