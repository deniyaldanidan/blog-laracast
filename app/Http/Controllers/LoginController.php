<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView()
    {
        return view("login.login-form");
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "usernameOrEmail" => "required",
            "password" => "required"
        ]);

        $emailRegex = '/^[\w\.-]+@[a-zA-Z\d\.-]+\.[a-zA-Z]{2,}$/';

        $idKey = (preg_match($emailRegex, request('usernameOrEmail')) === 1) ? "email" : "username";

        if (Auth::attempt([$idKey => request('usernameOrEmail'), 'password' => request('password')])) {
            $request->session()->regenerate();
            return redirect('/')->with("success", "You're successfully logged in");
        } else {
            return back()->withErrors([
                "usernameOrEmail" => "Invalid credentials"
            ])->onlyInput("usernameOrEmail")->with("error", "Login Failed, Invalid credentials.");
        }
    }
}
