<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Jamaah;
use App\Models\pengurus_dkm;

class Userr extends Model
{
    use HasFactory, SoftDeletes;
    protected $primaryKey = 'id_user';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_jamaah',
        'id_pengurus',
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function jamaah()
        {
            return $this->belongsTo(jamaah::class, 'id_jamaah', 'id_jamaah');
        }

    public function pengurus()
        {
            return $this->belongsTo(pengurus_dkm::class, 'id_pengurus', 'id_pengurus');
        }
}
