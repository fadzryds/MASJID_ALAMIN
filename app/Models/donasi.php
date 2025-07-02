<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Jamaah;
use App\Models\pengurus_dkm;

class donasi extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_donasi';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_kategori',
        'id_jamaah',
        'id_pengurus',
        'nominal',
        'jumlah_barang',
        'deskripsi_barang',
        'tanggal_donasi',
        'status_konfirmasi',
        'keterangan',
        'bukti_transaksi'
    ];

    public function scopePemasukanTunai($query)
    {
        return $query->whereHas('kategori', function ($query) {
            $query->where('jenis_kategori', 'Uang Tunai');
        });
    }
    
    public function scopePemasukanTransfer($query)
    {
        return $query->whereHas('kategori', function ($query) {
            $query->where('jenis_kategori', 'Uang Transfer');
        });
    }

    public function kategori()
        {
            return $this->belongsTo(kategori::class, 'id_kategori', 'id_kategori');
        }
        
    public function jamaah()
        {
            return $this->belongsTo(jamaah::class, 'id_jamaah', 'id_jamaah');
        }

    public function pengurus()
        {
            return $this->belongsTo(pengurus_dkm::class, 'id_pengurus', 'id_pengurus');
        }
}