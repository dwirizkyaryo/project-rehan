@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="p-6 border-b border-slate-100 flex justify-between items-center">
            <h3 class="font-bold text-slate-800">{{ $title }}</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 text-sm">
                    <tr>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Keterangan</th>
                        <th class="px-6 py-4">Kategori</th>
                        <th class="px-6 py-4 text-right">Jumlah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($transaksis as $transaksi)
                    <tr>
                        <td class="px-6 py-4 text-slate-600">{{ $transaksi->tanggal }}</td>
                        <td class="px-6 py-4 font-medium text-slate-800">{{ $transaksi->keterangan }}</td>
                        <td class="px-6 py-4 text-slate-600">{{ $transaksi->kategori }}</td>
                        <td class="px-6 py-4 text-right font-bold {{ $title == 'Pemasukan' ? 'text-emerald-600' : 'text-red-600' }}">{{ Illuminate\Support\Number::currency($transaksi->jumlah, 'IDR') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
