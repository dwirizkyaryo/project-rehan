@extends('layouts.app')

@section('content')
    <div class="space-y-6">
        <!-- Summary Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-emerald-600 p-6 rounded-2xl text-white shadow-lg">
                <p class="text-emerald-100 text-sm font-medium">Total Pemasukan</p>
                <h3 class="text-2xl font-bold mt-1">{{ $pemasukan }}</h3>
            </div>
            <div class="bg-rose-600 p-6 rounded-2xl text-white shadow-lg">
                <p class="text-rose-100 text-sm font-medium">Total Pengeluaran</p>
                <h3 class="text-2xl font-bold mt-1">{{ $pengeluaran }}</h3>
            </div>
            <div class="bg-amber-500 p-6 rounded-2xl text-white shadow-lg">
                <p class="text-amber-100 text-sm font-medium">Total Stok</p>
                <h3 class="text-2xl font-bold mt-1">{{ $stok_total }} Unit</h3>
            </div>
        </div>

        <!-- Recent Transactions -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100">
                <h3 class="font-bold text-slate-800">Transaksi Terbaru</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-500 text-sm">
                        <tr>
                            <th class="px-6 py-4">Tanggal</th>
                            <th class="px-6 py-4">Keterangan</th>
                            <th class="px-6 py-4">Tipe</th>
                            <th class="px-6 py-4 text-right">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($transaksi_terbaru as $transaksi)
                        <tr>
                            <td class="px-6 py-4 text-sm text-slate-600">{{ $transaksi->tanggal }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-slate-800">{{ $transaksi->keterangan }}</td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-1 rounded-full text-xs font-bold {{ $transaksi->tipe == 'masuk' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                    {{ ucfirst($transaksi->tipe) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800">{{ Illuminate\Support\Number::currency($transaksi->jumlah, 'IDR') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Stock Details -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="p-6 border-b border-slate-100">
                <h3 class="font-bold text-slate-800">Rincian Stok</h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-slate-50 text-slate-500 text-sm">
                        <tr>
                            <th class="px-6 py-4">Nama Produk</th>
                            <th class="px-6 py-4 text-right">Stok</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($stok_produk as $produk)
                        <tr>
                            <td class="px-6 py-4 text-sm font-medium text-slate-800">{{ $produk->nama_produk }}</td>
                            <td class="px-6 py-4 text-right font-bold text-slate-800">{{ $produk->stok }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection