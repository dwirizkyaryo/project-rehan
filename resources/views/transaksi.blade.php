@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Form Input -->
    <section class="bg-white p-6 rounded-xl shadow-sm">
        <h2 class="text-xl font-bold mb-4 text-slate-700">Input {{ $title }}</h2>
        <form action="/transaksi" method="POST" class="grid grid-cols-1 md:grid-cols-5 gap-4">
            @csrf
            <input type="hidden" name="tipe" value="{{ $tipe == 'Masuk' ? 'masuk' : 'keluar' }}">
            <input type="date" name="tanggal" class="p-2 border rounded-lg" value="{{ date('Y-m-d') }}" required>
            <input type="text" name="keterangan" placeholder="Keterangan" class="p-2 border rounded-lg" required>
            <input type="text" name="kategori" placeholder="Kategori" class="p-2 border rounded-lg" required>
            <input type="number" name="jumlah" placeholder="Jumlah" class="p-2 border rounded-lg" required>
            <button type="submit" class="bg-indigo-600 text-white p-2 rounded-lg font-semibold hover:bg-indigo-700">Tambah</button>
        </form>
    </section>

    <!-- Tabel -->
    <section class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-500 text-sm">
                <tr>
                    <th class="px-6 py-4">Tanggal</th>
                    <th class="px-6 py-4">Keterangan</th>
                    <th class="px-6 py-4">Kategori</th>
                    <th class="px-6 py-4 text-right">Jumlah</th>
                    <th class="px-6 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @foreach($transaksis as $t)
                <tr>
                    <td class="px-6 py-4">{{ $t->tanggal }}</td>
                    <td class="px-6 py-4 font-bold text-slate-800">{{ $t->keterangan }}</td>
                    <td class="px-6 py-4">{{ $t->kategori }}</td>
                    <td class="px-6 py-4 text-right font-bold {{ $t->tipe == 'masuk' ? 'text-emerald-600' : 'text-red-600' }}">Rp {{ number_format($t->jumlah, 0, ',', '.') }}</td>
                    <td class="px-6 py-4 text-center">
                        <form action="/transaksi/{{ $t->id }}" method="POST" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>
@endsection
