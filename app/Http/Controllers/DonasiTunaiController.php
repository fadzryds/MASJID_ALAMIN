<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\donasi;
use App\Models\jamaah;
use App\Models\pengurus_dkm;

class DonasiTunaiController extends Controller
{
    public function formTunai()
    {
        $jamaahList = jamaah::all();
        $pengurusList = pengurus_dkm::all();
        return view('donasi_tunai', compact('jamaahList', 'pengurusList'));
    }

    public function submitTunai(Request $request)
    {
        $request->validate([
            'id_jamaah' => 'required|exists:jamaahs,id_jamaah',
            'id_pengurus' => 'required|exists:pengurus_dkms,id_pengurus',
            'nominal' => 'required|numeric',
            'tanggal_donasi' => 'required|date',
            'bukti_transaksi' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buktiPath = $request->file('bukti_transaksi')->store('bukti', 'public');

        donasi::create([
            'id_kategori' => 2,
            'id_jamaah' => $request->id_jamaah,
            'id_pengurus' => $request->id_pengurus,
            'nominal' => $request->nominal,
            'tanggal_donasi' => $request->tanggal_donasi,
            'bukti_transaksi' => $buktiPath,
            'status_konfirmasi' => 'Menunggu',
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('donasi.success');
    }
}