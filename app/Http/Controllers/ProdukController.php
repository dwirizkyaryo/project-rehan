<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('stok', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|integer',
            'kategori' => 'required|string',
        ]);
        Produk::create($request->all());
        return redirect('/stok')->with('success', 'Produk berhasil ditambah');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('edit_produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());
        return redirect('/stok')->with('success', 'Produk berhasil diupdate');
    }

    public function destroy($id)
    {
        Produk::destroy($id);
        return redirect('/stok')->with('success', 'Produk berhasil dihapus');
    }
}
