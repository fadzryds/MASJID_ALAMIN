<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class pengurus_dkm extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'id_pengurus';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'nama_lengkap',
        'jabatan',
        'no_hp',
        'status_aktif'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function donasiDiterima()
    {
        return $this->hasMany(donasi::class, 'id_pengurus');
    }

    public function pengeluaran()
    {
        return $this->hasMany(donasi::class, 'id_pengurus');
    }

    public function kegiatan()
    {
        return $this->hasMany(donasi::class, 'id_pengurus');
    }
}
