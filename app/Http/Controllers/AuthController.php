<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credenciales = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $credenciales['status'] = true;

        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'coordinador') {
                return redirect()->route('dashboard');
            }

            return redirect()->route('secretario.dashboard');
        }

        return back()
            ->withErrors([
                'username' => 'El usuario o la contraseña son incorrectos.',
            ])
            ->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
