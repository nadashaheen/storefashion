<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $url = url()->previous();

        if (str_contains($url, 'admin')) {
            return view('admin.admin.login');
        } elseif (Auth::guard('web') || str_contains($url, 'user')) {
            return view('frontsite.pre_index');
        }
    }


    public function logout()
    {
        if (Auth::guard('webadmin')->check()) {
            Auth::guard('webadmin')->logout();
            return redirect()->route('login');
        }

    }

    public function authenticate(Request $request)
    {
        $login_data = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('webadmin')->attempt($login_data)) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'invalid username or password');
    }

    public function signin()
    {

        return view('frontsite.signin');

    }

    public function do_signin(Request $request)
    {
        $login_data = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('web')->attempt($login_data)) {
            return redirect()->route('home');
        }
        return redirect()->back()->with('error', 'invalid username or password');
    }

    public function user_logout()
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect()->route('signin');
        }

    }


}
