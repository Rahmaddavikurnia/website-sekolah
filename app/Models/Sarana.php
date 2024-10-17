<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sarana extends Model
{
    use HasFactory;

    protected $fillable = ['nama','slug', 'deskripsi', 'lokasi', 'kapasitas', 'gambar'];

    // public function kabars()
    // {
    //     return $this->morphMany(Kabar::class, 'related');
    // }
}
