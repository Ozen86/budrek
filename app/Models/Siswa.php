<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Siswa extends Model
{
    use HasRoles;

    protected $fillable = [
        'nama',
        'nisn',
        'gender',
        'alamat',
        'kontak',
        'email',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    public function pklis()
    {
        return $this->hasMany(Pklis::class, 'siswa_id');
    }
}
