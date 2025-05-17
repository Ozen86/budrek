<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    protected $fillable = [
        'nama_industri',
        'bidang_usaha',
        'alamat',
        'kontak',
        'email',
        'website',
    ];

    public function down(): void
    {
        Schema::dropIfExists('industris');
    }

    public function pklis()
    {
        return $this->hasMany(Pklis::class, 'industri_id');
    }
}
