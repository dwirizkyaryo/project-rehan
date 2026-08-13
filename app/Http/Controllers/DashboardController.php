<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class DashboardController extends Controller
{
    public function index()
    {
        $pemasukan = Transaksi::where('tipe', 'masuk')->sum('jumlah');
        $pengeluaran = Transaksi::where('tipe', 'keluar')->sum('jumlah');
        $stok_total = Produk::sum('stok');
        
        $transaksi_terbaru = Transaksi::orderBy('tanggal', 'desc')->limit(5)->get();
        $stok_produk = Produk::orderBy('nama_produk')->get();

        return view('dashboard', [
            'pemasukan' => Number::currency($pemasukan, 'IDR'),
            'pengeluaran' => Number::currency($pengeluaran, 'IDR'),
            'stok_total' => $stok_total,
            'transaksi_terbaru' => $transaksi_terbaru,
            'stok_produk' => $stok_produk,
        ]);
    }
}
