<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kategori extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_kategori';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'kode_kategori',
        'jenis_kategori',
    ];

    public function donasi()
    {
        return $this->hasMany(donasi::class, 'id_kategori');
    }
}
