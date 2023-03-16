<?php

namespace App\Http\Controllers;
// menghubungkan ke folder app\http\Controllers

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
	// Public Function index/ public function berarti dapat diakses dimana saja
    {
        return view('login');
	// hubugngkan ke folder view file login
    }
    public function login_proses(Request $request)
	// membawa data dari hasil form data yang bernama Request lalu mengubahnya menjadi $request
{
	$validasi = $request->validate([
	// Data dari $request di validasi kan
		'email'     => 'required|email',
		'password'  => 'required'
	// email harus di-isi dan diinputkan sesuai format email, password harus diisi lalu disimpan ke $validasi
	]);

	if (Auth::attempt($validasi)) {
	// jika percobaan validasi berhasil
	
		$request->session()->regenerate();
	// data $request diperbarui
		return redirect()->intended('/dashboard');
	// user akan di alihkan ke halaman /dashboard
	
	}

	return back()->with('loginError', 'Gagal Login');
	// jika percobaan validasi gagal makan akan ada notif loginerror dan Gagal login
}
	public function logout(Request $request)
	// mengubah data yang tersimpan di Request menjadi #request
{
	Auth::logout();
	$request->session()->invalidate();
	// mengubah data yang telah di validasikan menjadi tidak berlaku lagi
	$request->session()->regenerateToken();
	// memperbarui token
	return redirect('/');
	// mengarahkan user ke halamanan /
}
}
