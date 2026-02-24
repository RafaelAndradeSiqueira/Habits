<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginService {

    public static function index()
    {
        return view('login');
    }

    public static function authenticate(LoginRequest $request)
    {
       $credentials = $request->only('email', 'password');

       if (Auth::attempt($credentials)) {

           $request->session()->regenerate();

          return redirect()->intended(route('habits.index'));
       }

        return back()->withErrors([
            'email' => 'Credenciais Inválidas',
          ])->withInput($request->only('email', 'remember'));

    }

    public static function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
