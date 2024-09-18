<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
        $credential = $request->only((['email', 'password']));
        if (Auth::attempt($credential)) {
            Alert::success('Success', 'Login Anda Berhasil');
            return redirect()->intended('dashboard');
        }
        Alert::error('Sorry', 'Chek Kembali Email dan Password Anda');
        return redirect()->back()->withErrors(['message' => 'Login Gagal. Mohon Periksa Kembali Email dan Password Anda']);
    }
}
