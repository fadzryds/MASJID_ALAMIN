<?php

namespace App\Http\Controllers;

use App\Models\kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status'); // Ambil parameter ?status=
        $dataKegiatan = kegiatan::when($status, function ($query, $status) {
            return $query->where('status_kegiatan', $status);
        })->orderBy('tanggal', 'desc')->get();

        return view('kegiatan', compact('dataKegiatan'));
    }
}