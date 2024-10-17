<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kabar extends Model
{
    use HasFactory;

    protected $fillable = ['judul_kabar','slug', 'isi_kabar', 'tanggal_terbit','gambar', 'tanggal_berlaku','related_type'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'comentable');
    }
}
