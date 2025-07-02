<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\pengurus_dkm;

class pengeluaran extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_pengeluaran';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_pengurus',
        'nominal',
        'deskripsi_pengeluaran',
        'tanggal',
        'status_persetujuan',
        'bukti_pengeluaran',
    ];

    public function pengurus()
    {
        return $this->belongsTo(pengurus_dkm::class, 'id_pengurus', 'id_pengurus');
    }
}
