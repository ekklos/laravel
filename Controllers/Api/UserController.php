<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(){
    Log::info('user sedang melihat semua data user');
        return response()->json([
            "Data" => User::all()
        ], 200);
    }


    public function total_user(){
    Log::info('user sedang menghitung jumlah data user');
        return response()->json([
            "totaluser" => User::count()
        ]);
    }
}
