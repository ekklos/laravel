<?php

namespace App\Http\Controllers;
// menghubungkan ke folder app\http\controllers

use Illuminate\Http\Request;
// menggunakan illuminate sebagai mesin database dan mengambil data dari folder http
use App\Models\Product;
// menggunakan data di folder app\models\Product

class DashboardController extends Controller
// class DashboardController membawa data dari Controllers
{
    public function index()
      {
        $total= Product::count();
        //menghitung jumlah sel yang berisi angka, dan menghitung angka dalam daftar argumen
        return view('pages.dashboard', [
        // menghubungkan ke folder view/pages/dashboard.php
          'total' => $total
        // total dari penamaan dijadikan $total
        ]);
      }
    }