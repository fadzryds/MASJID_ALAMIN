<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil {{ $role }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="background-profil">
    <div class="box-profil">
        <h2>Profil {{ $role }}</h2>

        @if(session('success'))
            <p style="color: limegreen;"><strong>{{ session('success') }}</strong></p>
        @endif

        <form action="{{ route('profil.update', [$role, $data->id_jamaah ?? $data->id_pengurus]) }}" method="POST">
            @csrf

            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="{{ $data->nama_lengkap }}" required>

            <label>No HP</label>
            <input type="text" name="no_hp" value="{{ $data->no_hp }}" required>

            @if ($role === 'Jamaah')
                <label>Alamat</label>
                <input type="text" name="alamat" value="{{ $data->alamat }}" required>
            @elseif ($role === 'Pengurus')
                <label>Jabatan</label>
                <input type="text" name="jabatan" value="{{ $data->jabatan }}" required>
            @endif

            <button type="submit" class="btn-kembali-profil">Simpan Perubahan</button>
        </form>
    </div>
</div>
</body>
</html>