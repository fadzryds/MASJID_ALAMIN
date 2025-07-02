<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Kategori;
use App\Models\Pengeluaran;

class LandingPageController extends Controller
{
    public function home()
    {
        $kategoriDonasi = Kategori::all();

        $dataDonasi = $kategoriDonasi->map(function ($kategori) {
            $totalPemasukan = Donasi::where('id_kategori', $kategori->id_kategori)
                ->pemasukanTunai()->sum('nominal')
                + Donasi::where('id_kategori', $kategori->id_kategori)
                ->pemasukanTransfer()->sum('nominal');

            return [
                'nama' => $kategori->nama_kategori ?? 'Donasi Pembangunan Masjid',
                'target' => $kategori->target_donasi ?? 100000000,
                'terkumpul' => $totalPemasukan,
                'sisaHari' => 98, // bisa dinamis kalau kamu mau
                'gambar' => $kategori->gambar ?? 'assets/donasi.png'
            ];
        });

        $totalPemasukan = Donasi::pemasukanTunai()->sum('nominal') + Donasi::pemasukanTransfer()->sum('nominal');
        $totalPengeluaran = Pengeluaran::sum('nominal');

        return view('home', compact('dataDonasi', 'totalPemasukan', 'totalPengeluaran'));
    }

    public function landingpage()
    {
        $kategoriDonasi = Kategori::all();

        $dataDonasi = $kategoriDonasi->map(function ($kategori) {
            $totalPemasukan = Donasi::where('id_kategori', $kategori->id_kategori)
                ->pemasukanTunai()->sum('nominal')
                + Donasi::where('id_kategori', $kategori->id_kategori)
                ->pemasukanTransfer()->sum('nominal');

            return [
                'nama' => $kategori->nama_kategori ?? 'Donasi Pembangunan Masjid',
                'target' => $kategori->target_donasi ?? 100000000,
                'terkumpul' => $totalPemasukan,
                'sisaHari' => 98, // bisa dinamis kalau kamu mau
                'gambar' => $kategori->gambar ?? 'assets/donasi.png'
            ];
        });

        $totalPemasukan = Donasi::pemasukanTunai()->sum('nominal') + Donasi::pemasukanTransfer()->sum('nominal');
        $totalPengeluaran = Pengeluaran::sum('nominal');

        return view('landingpage', compact('dataDonasi', 'totalPemasukan', 'totalPengeluaran'));
    }
}