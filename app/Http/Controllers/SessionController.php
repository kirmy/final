<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function check(Request $request)
    {
        dd($request);
        $mail = $request('email');
        $password = $request('password');
        
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->intended('home');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
