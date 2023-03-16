<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
	$product = Product::select('id','namaproduk','deskripsi','harga','gambar')->get();
		return response()->json([
			'data' => $product
	], 200);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // Request sebelum @request merupakan data dari form / form-data
    {
       
        $validasi = Validator::make($request->all(), [
            'namaproduk' => 'required',
            'deskripsi'  => 'required',
            'harga'      => 'required|integer',
            'gambar'     => 'required|image|mimes:jpg,png|max:4096'
        ]);

        // Respon kalau validasi gagal (gagal menurut syarat yang ditentukan)
        if($validasi->fails()) {
            return response()->json($validasi->errors(), 422);
        }

        // Simpan gambar ke Storage
        $gambar = $request->file('gambar')->store('public/gambar');
        // Menyimpan data ke database
        $data = Product::create([
            'namaproduk' => $request->namaproduk,
            'deskripsi'  => $request->deskripsi,
            'harga'      => $request->harga,
            'gambar'     => $gambar
        ]);
        // Respon jika berhasil
        Log::info('user sedang menambahkan data produk baru');
        return response()->json([
            "status" => "Berhasil",
            "data"   => $data
        ], 201);
        //log info harus diletakkan sebelum return
        //log info merupakan informasi yang terdapat di laravel.log dengan notifikasi sesuai dgn ''
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
{
	Log::info('user sedang menampilkan data produk berdasarkan id='.$id);
            $product = Product::select('id', 'namaproduk', 'deskripsi', 'harga', 'gambar')->where('id', $id)->first();
            return response()->json([
                "data" => $product
            ], 200);
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Log::info('user sedang mengubah data produk berdasakran id='.$id);
        $validasi = Validator::make($request->all(), [
            'namaproduk' => 'required',
            'deskripsi'  => 'required',
            'harga'      => 'required|integer'
        ]);

        // Respon kalau validasi gagal (gagal menurut syarat yang ditentukan)
        if($validasi->fails()) {
            return response()->json($validasi->errors(), 422);
        }

        Product::where('id', $id)->update($request->all());

        return response()->json([
            "status" => "Update Sukses"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('user sedang menghapus data produk berdasarkan id='.$id);
        $product = Product::where('id', $id)->first();
        // Menghapus gambar dari storage
        if ($product->gambar) {
            Storage::delete($product->gambar);
        }


        // Menghapus data dari database
        $product->delete();

        return response()->json([
            "status" => "Hapus Sukses"
        ], 200);
    }
}
