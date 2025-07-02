<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;

class jamaah extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_jamaah';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'nama_lengkap',
        'no_hp',
        'alamat'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function donasi()
    {
        return $this->hasMany(donasi::class, 'id_jamaah');
    }
}
