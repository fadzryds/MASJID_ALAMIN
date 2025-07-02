<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\pengurus_dkm;

class kegiatan extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_kegiatan';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_pengurus',
        'nama_kegiatan',
        'waktu_mulai',
        'waktu_selesai',
        'lokasi',
        'deskripsi',
        'tanggal',
        'status_kegiatan',
    ];

    public function pengurus()
    {
        return $this->belongsTo(pengurus_dkm::class, 'id_pengurus', 'id_pengurus');
    }
}
