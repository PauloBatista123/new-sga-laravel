<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function logar(Request $request)
    {
        $email = $request->username;
        $password = $request->password;

        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return redirect()->route('login');
    }
}
