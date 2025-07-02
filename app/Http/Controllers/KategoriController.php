<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = kategori::all();
        return view('kategori', compact('kategori'));
    }

    public function pilih(Request $request)
    {
        $jenis = $request->input('jenis_kategori');

        if ($jenis === 'Uang Transfer') {
            return redirect()->route('donasi.transfer');
        } elseif ($jenis === 'Uang Tunai') {
            return redirect()->route('donasi.tunai');
        } elseif ($jenis === 'Barang') {
            return redirect()->route('donasi.barang');
        }

        return redirect()->route('kategori.donasi')->with('error', 'Pilihan tidak valid.');
    }
}
