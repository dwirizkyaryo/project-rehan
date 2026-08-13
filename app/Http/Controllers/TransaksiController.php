<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index($tipe)
    {
        $transaksis = Transaksi::where('tipe', $tipe)->orderBy('tanggal', 'desc')->get();
        $title = ucfirst($tipe);
        return view('transaksi', compact('transaksis', 'title', 'tipe'));
    }

    public function pemasukan()
    {
        return $this->index('masuk');
    }

    public function pengeluaran()
    {
        return $this->index('keluar');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'keterangan' => 'required|string',
            'kategori' => 'required|string',
            'jumlah' => 'required|integer',
            'tipe' => 'required|in:masuk,keluar',
        ]);
        
        Transaksi::create($validated);
        return back()->with('success', 'Data berhasil ditambah');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $tipe = $transaksi->tipe;
        $transaksi->delete();
        return redirect('/' . $tipe)->with('success', 'Data berhasil dihapus');
    }
}
