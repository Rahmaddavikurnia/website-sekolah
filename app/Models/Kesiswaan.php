<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesiswaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama_program',
        'slug',
        'deskripsi_program',
        'penanggung_jawab',
        'foto_program',
        'foto_anggota',
    ];

    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class, 'jurusan_kesiswaan');
    }
}
