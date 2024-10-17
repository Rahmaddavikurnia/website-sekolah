<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'slug','deskripsi', 'tanggal', 'kategori', 'gambar',
    ];

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class, 'prestasi_siswa');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'comentable');
    }

}
