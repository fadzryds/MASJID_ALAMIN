<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jamaah;
use App\Models\pengurus_dkm;

class ProfilController extends Controller
{
    public function show($role, $id)
    {
        if ($role === 'Jamaah') {
            $data = jamaah::findOrFail($id);
        } elseif ($role === 'Pengurus') {
            $data = pengurus_dkm::findOrFail($id);
        } else {
            abort(404);
        }

        return view('profil', compact('data', 'role'));
    }

    public function update(Request $request, $role, $id)
    {
        if ($role === 'Jamaah') {
            $request->validate([
                'nama_lengkap' => 'required',
                'no_hp' => 'required',
                'alamat' => 'required',
            ]);
            $data = jamaah::findOrFail($id);
            $data->update($request->only(['nama_lengkap', 'no_hp', 'alamat']));

        } elseif ($role === 'Pengurus') {
            $request->validate([
                'nama_lengkap' => 'required',
                'no_hp' => 'required',
                'jabatan' => 'required',
            ]);
            $data = pengurus_dkm::findOrFail($id);
            $data->update($request->only(['nama_lengkap', 'no_hp', 'jabatan']));
        }

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}