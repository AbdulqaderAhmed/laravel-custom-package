<?php

namespace AB\Authify;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthsController extends Controller
{
    public function login()
    {
        return view('authify::login');
    }

    public function register()
    {
        return view('authify::register');
    }

    public function customRegister(Request $req)
    {
        $cred = $req->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users',
            'password' => 'required|string|min:8'
        ]);

        $data = User::create([
            'name' => $cred['name'],
            'email' => $cred['email'],
            'password' => Hash::make($cred['password'])
        ]);

        return view('authify::login');
    }


    public function customLogin(Request $req)
    {
        $req->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $cred = $req->only(['email', 'password']);

        if (Auth::attempt($cred)) {
            return view('pages.index');
        }

        return view('authify::login');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return view('authify::login');
    }
}
