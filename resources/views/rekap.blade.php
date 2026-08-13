@extends('layouts.app')

@section('content')
<div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
        <h3 class="font-bold text-slate-800">Rekapitulasi Transaksi</h3>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-500 text-sm">
                <tr>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Deskripsi</th>
                    <th class="px-6 py-4">Tipe</th>
                    <th class="px-6 py-4 text-right">Jumlah</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($transaksis as $t)
                <tr>
                    <td class="px-6 py-4 text-slate-600">{{ $t->tanggal }}</td>
                    <td class="px-6 py-4 font-medium text-slate-800">{{ $t->deskripsi }}</td>
                    <td class="px-6 py-4 text-slate-600">{{ $t->tipe }}</td>
                    <td class="px-6 py-4 text-right font-bold {{ $t->tipe == 'masuk' ? 'text-emerald-600' : 'text-red-600' }}">Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
