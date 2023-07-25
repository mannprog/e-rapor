<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function prosesLogin(Request $request): RedirectResponse
    {
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        $data = [
            $fieldType => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            Auth::check();
            if (Auth::user()->is_admin == 0) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('siswa.dashboard');
            }
        }

        return back()->with('loginError', 'Username/Email atau Password Salah!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->to('/');
    }
}
