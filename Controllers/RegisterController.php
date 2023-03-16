<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view("register"); 
        // mengubungkan ke folder view/register
    }
    public function register_proses(Request $request){
      // fungsi dari register proses mengambil data request dari form-data lalu mengubahnya menjadi $request
        $validasi = $request->validate([
      // data dari $request divalidasikan lalu di simpan di $validasi
          'name' => 'required|max:128',//name harus diisi dan maximal huruf 128
          'email' => 'required|unique:users|email',//email harus diisi field/input tersebut tidak boleh sama dengan data yang sudah ada di dalam table users dan input berupa email
          'password' => 'required|min:6|confirmed'//password minimal 6 huruf/angka dan di konfirmasi
        ]); 
        $validasi['password'] = Hash::make($validasi['password']);
        // data dari $validasi berupa password harus sama dengan password yang diinput
              
          User::create($validasi);
        // megambil fungsi dari create dan memproses data yang telah di validasi
      
          return redirect('/');
        // megembalikan user ke halaman /
      }
}

