<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('guest.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === $request->password) {
            return redirect('/admin')
                ->with('success', 'Login berhasil!');
        }

        return redirect('/auth')
            ->with('error', 'Username dan password salah!');
    }
}
