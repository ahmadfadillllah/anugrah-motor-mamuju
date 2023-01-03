<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.index');
        }

        return back()->withErrors([
            'email' => 'Email tidak ditemukan',
            'password' => 'Password salah',
        ])->onlyInput('email', 'password');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_post(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required|max:20',
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed',
            'no_hp' => 'required|min:11|max:13'
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'no_hp' => $request->no_hp,
                'role' => 'masyarakat',
                'avatar' => 'user2.png'
            ]);
            return redirect()->route('login')->with('success', 'Pendaftaran akun berhasil, silahkan login');
        } catch (\Throwable $th) {
            return redirect()->route('register')->with('info', $th->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
