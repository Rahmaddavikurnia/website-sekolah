<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Humas extends Model
{
    use HasFactory;

    protected $fillable = ['judul_kegiatan', 'slug' , 'deskripsi_kegiatan', 'tanggal_kegiatan', 'tempat', 'pihak_terkait', 'gambar'];

    // public function kabars()
    // {
    //     return $this->morphMany(Kabar::class, 'related');
    // }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'comentable');
    }

}
