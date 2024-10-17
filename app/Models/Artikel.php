<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_artikel',
        'slug',
        'isi_artikel',
        'penulis_id',
        'tanggal_terbit',
        'kategori_type',  // Jenis kategori disimpan di sini
        'thumbnail',
        'views'
    ]; 

    public function user()
    {
        return $this->belongsTo(User::class,'penulis_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'comentable');
    }
}
