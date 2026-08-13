@extends('layouts.app')

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Form Tambah -->
    <div class="lg:col-span-1">
        <section class="bg-white p-6 rounded-xl shadow-sm">
            <h2 class="text-xl font-bold mb-4 text-slate-700">Tambah Produk Baru</h2>
            <form action="/stok" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1">Nama Produk</label>
                    <input type="text" name="nama_produk" class="w-full p-2 border border-slate-300 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1">Harga</label>
                    <input type="number" name="harga" class="w-full p-2 border border-slate-300 rounded-lg" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-1">Kategori</label>
                    <select name="kategori" class="w-full p-2 border border-slate-300 rounded-lg" required>
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                        <option value="Cemilan">Cemilan</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">Tambah</button>
            </form>
        </section>
    </div>

    <!-- Daftar Produk -->
    <div class="lg:col-span-2">
        <section class="bg-white rounded-xl shadow-sm">
            <div class="p-4 border-b border-slate-100">
                <h2 class="font-bold text-lg text-slate-700">Daftar Produk</h2>
            </div>
            <div class="divide-y divide-slate-100">
                @foreach($produks as $produk)
                <div class="flex items-center p-4">
                    <div class="ml-4 flex-grow">
                        <p class="font-bold text-slate-800">{{ $produk->nama_produk }}</p>
                        <p class="text-sm text-slate-500">{{ $produk->kategori }}</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <p class="font-semibold text-lg text-slate-700">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                        <a href="/stok/{{ $produk->id }}/edit" class="text-slate-400 hover:text-indigo-600 transition" title="Edit">Edit</a>
                        <form action="/stok/{{ $produk->id }}" method="POST" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-slate-400 hover:text-red-600">Hapus</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>
@endsection
