<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        if (!filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->withErrors(['E-mail não é valido!']);
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->status == 1) {
            if (Auth::user()->user_type == 0) {
                return redirect()->route('admin.dashboard');
            }

            if (Auth::user()->user_type == 1) {
                return redirect()->route('operadora.dashboard');
            }
        }

        return redirect()->back()->withErrors(['E-mail ou senha não conferem!']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
