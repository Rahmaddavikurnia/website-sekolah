<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nama',
        'slug',
        'deskripsi',
        'foto',
        'kegiatan',
    ];

    public function peluangkarir()
    {
        return $this->hasMany(Peluangkarir::class);
    }

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }
    
    public function kurikulum()
    {
        return $this->hasMany(Kurikulum::class);
    }

    public function gurus()
    {
        return $this->belongsToMany(Guru::class, 'guru_jurusan');
    }
    
    public function kesiswaans()
    {
        return $this->belongsToMany(Kesiswaan::class, 'jurusan_kesiswaan');
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
