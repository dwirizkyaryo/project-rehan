@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="text-3xl font-bold mb-6 text-slate-800">Catat Penjualan</h1>
    <div class="bg-white p-6 rounded-xl shadow-sm">
        <form action="/penjualan" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-semibold text-slate-600 mb-1">Tanggal</label>
                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" class="w-full p-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-slate-600 mb-1">Pilih Produk</label>
                <select name="produk_id" class="w-full p-2 border rounded-lg" required>
                    @foreach($produks as $p)
                        <option value="{{ $p->id }}">{{ $p->nama_produk }} (Stok: {{ $p->stok }}) - Rp {{ number_format($p->harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label class="block font-semibold text-slate-600 mb-1">Jumlah Item</label>
                <input type="number" name="jumlah_item" value="1" min="1" class="w-full p-2 border rounded-lg" required>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white font-semibold py-2 rounded-lg hover:bg-indigo-700">Simpan</button>
        </form>
    </div>
</div>
@endsection
