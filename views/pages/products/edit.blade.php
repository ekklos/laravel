@extends('pages.main')

@section('content')
<h3 class="mb-5">Edit Produk</h3>

<div class="col-6">
  <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="mb-3">
      <label for="nama-produk" class="form-label">Nama Produk</label>
      <input type="text" class="form-control" name="namaproduk" id="namaproduk" value="{{ $product->namaproduk }}"required>
    @error('namaproduk')
    <small class="text-danger">{{ $message }}</small>
    					{{-- Jika namaproduk tidak di input maka akan muncul notifikasi --}}
    @enderror
    </div>
    <div class="mb-3">
      <label for="deskripsi" class="form-label">Deskripsi Produk</label>
      <textarea rows="5" class="form-control" name="deskripsi" id="deskripsi" required>{{ $product->deskripsi }}</textarea>
      @error('deskripsi')
      <small class="text-danger">{{ $message }}</small>
      					{{-- Jika deskripsi tidak di input maka akan muncul notifikasi --}}
      @enderror
    </div>
    <div class="mb-3">
      <label for="harga" class="form-label">Harga Produk</label>
      <input type="number" class="form-control" name="harga" id="harga" value="{{ $product->harga }}"required>
      @error('harga')
      <small class="text-danger">{{ $message }}</small>
      					{{-- Jika harga tidak di input maka akan muncul notifikasi --}}
      @enderror
    </div>
    <button type="submit" class="btn btn-custom">Edit</button>
  </form>
</div>
@endsection

