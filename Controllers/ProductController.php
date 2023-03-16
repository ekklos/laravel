<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
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
  $products = Product::all();
//   $product menyimpan semua data produk
  return view('pages.products.index', [
    // menghubungkan user ke folder view/pages/products/index
    'products' => $products
    // products dari penamaan di ubah menjadi $products
  ]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.products.tambah');
    // fungsi dari create di publikasi dan dihubungkan ke view/pages/products/tambah
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // fungsi store di publikasikan, mengambil data dari request lalu mengubahnya menjadi $request
{
    $validasi = $request->validate([
        // data dari request di validasikan atau disahkan lalu disimpan di $validasi
        'namaproduk' => 'required', // namaproduk harus diisi
        'deskripsi' => 'required', // deskripsi harus diisi
        'harga' => 'required|integer', // harga harus diisi dan berupa angka
        'gambar' => 'required|file|mimes:jpg,png|max:4096' // gambar harus diisi berupa file ektensi jpg, png dan ukuran maximal 4096kb
    ]);

    if ($request->file('gambar')) {
        //jika file berbentuk gambar
        $validasi['gambar'] = $request->file('gambar')->store('public/gambar');
        // sahkan gambar menjadi file gambar lalu dikirim ke function store public/gambar
    }

    Product::create($validasi);
    //function create dari product mengambil data yang telah disahkan/di validisi

    return redirect('/products')->with('success', 'Data berhasil disimpan');
    //user dikembalikan ke halaman /products dengan notif succes dan data berhasil disimpan

}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::select('id', 'namaproduk', 'deskripsi', 'harga', 'gambar')->where('id', $id)->first();
        // $product memilih data id, namaproduk, deskripsi, harga dan gambar dari database berdasarkan id
        Log::info('user sedang menampilkan data produk berdasarkan id='.$id);
        // menampilkan informasi login pada laravel log user sedang menampilkan data produk berdasarkan id
        return response()->json([
        // di jalankan dengan json
            "data" => $products
        // data disimpan di $products
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    // fungsi edit di publikasi, mengambil data dari form-data mengubah jadi Product -> $product
    {
        return view('pages.products.edit', [
    // mengubungkan ke folder view/pages/products/edit
            'product' => $product
    // product diubah menjadi $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    // function update mengambil data produk dan request lalu mengubanya menjadi varibel
    {
        $validasi = $request->validate([
            // data dari $request di validasikan lalu disimpan ke $validasi
            'namaproduk' => 'required|max:255',//namaproduk harus diisi dan maximal inputan yakni 255
            'deskripsi'  => 'required',//deskripsi harus diisi
            'harga'      => 'required|integer'//harga harus diisi dan berupa angka
        ]);
    
        Product::where('id', $product->id)->update($validasi);
        // mengecek data lalu mengubahnya berdasarkan id
    
        return redirect('/products')->with('success', 'Data produk berhasil diedit!');
        // user dikembalikan ke halaman /products dengan notifikasi succes dan data berhasil diedit
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    // fungsi destroy di publikasikan, data product dari form data diubah menjadi $product
    {
        if ($product->gambar) {
        // jika data dari $product berupa gambar
            Storage::delete($product->gambar);
        // maka gambar akan di hapus dari storage atau penyimpanan
        }
    
        Product::destroy($product->id);
        // menghapus produk berdasarkan id yang dipilih pengguna
        return redirect('/products')->with('success', 'Data produk berhasil dihapus!');
        // user dikembalikan ke halaman /products dengan notif succes dan data produk berhasil dihapus
    }
}
