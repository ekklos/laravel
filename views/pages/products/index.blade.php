@extends('pages.main')

@section('content')

<h3 class="mb-5">Halaman Kelola Data Produk</h3>

<a href="/products/create" class="btn btn-warning btn-custom mb-3">Tambah Produk</a>

@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  {{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id Produk</th>
        <th>Nama Produk</th>
        <th>Deskripsi</th>
        <th>Harga</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($products as $item) 
      {{-- mengambil data $products lalu diubah menjadi item --}}
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->namaproduk }}</td>
        <td>{{ $item->deskripsi }}</td>
        <td>{{ $item->harga }}</td>
        <td><img src="{{ Storage::url($item->gambar) }}" alt="" width="100"></td>
        {{-- mengambil data gambar di storage --}}
        <td>
          <a href="/products/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>
          {{-- edit berdasarkan id data --}}
          <form action="/products/{{ $item->id }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
            {{-- menghapus data berdasarkan id --}}
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection