@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-slate-800">Edit Produk</h1>
    <div class="bg-white p-6 rounded-xl shadow-sm">
        <form action="/stok/{{ $produk->id }}" method="POST">
            @csrf @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block font-semibold text-slate-600 mb-1">Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="w-full p-2 border border-slate-300 rounded-lg" required>
                </div>
                <div>
                    <label class="block font-semibold text-slate-600 mb-1">Harga</label>
                    <input type="number" name="harga" value="{{ $produk->harga }}" class="w-full p-2 border border-slate-300 rounded-lg" required>
                </div>
                <div>
                    <label class="block font-semibold text-slate-600 mb-1">Kategori</label>
                    <select name="kategori" class="w-full p-2 border border-slate-300 rounded-lg">
                        <option value="Makanan" {{ $produk->kategori == 'Makanan' ? 'selected' : '' }}>Makanan</option>
                        <option value="Minuman" {{ $produk->kategori == 'Minuman' ? 'selected' : '' }}>Minuman</option>
                        <option value="Cemilan" {{ $produk->kategori == 'Cemilan' ? 'selected' : '' }}>Cemilan</option>
                        <option value="Lainnya" {{ $produk->kategori == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg hover:bg-indigo-700">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
