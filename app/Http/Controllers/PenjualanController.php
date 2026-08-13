<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function create()
    {
        $produks = Produk::where('stok', '>', 0)->get();
        return view('penjualan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'produk_id' => 'required|exists:produk,id',
            'jumlah_item' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($request) {
            $produk = Produk::findOrFail($request->produk_id);

            if ($produk->stok < $request->jumlah_item) {
                return back()->withErrors(['error' => "Stok tidak mencukupi. Sisa: {$produk->stok}"]);
            }

            $total = $produk->harga * $request->jumlah_item;
            
            Transaksi::create([
                'tanggal' => $request->tanggal,
                'keterangan' => $produk->nama_produk . " (x" . $request->jumlah_item . ")",
                'jumlah' => $total,
                'tipe' => 'masuk',
                'kategori' => $produk->kategori
            ]);

            $produk->decrement('stok', $request->jumlah_item);

            return redirect('/pemasukan')->with('success', 'Penjualan berhasil');
        });
    }
}
