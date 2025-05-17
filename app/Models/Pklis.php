<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pklis extends Model
{
    protected $fillable = [
        'siswa_id',
        'industri_id',
        'guru_id',
        'mulai',
        'selesai',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function indsutri()
    {
        return $this->belongsTo(indsutri::class, 'industri_id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id');
    }
}
