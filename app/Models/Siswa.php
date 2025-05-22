<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

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
        return $this->hasMany(Pklis::class);
    }

    public function getKetGenderAttribute()
    {
        return DB::selectOne("SELECT ketGender(?) AS gender", [$this->gender])->gender ?? '-';
    }
}
