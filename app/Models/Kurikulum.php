<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nama',
        'deskripsi',
        'jurusan_id',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    // public function kabars()
    // {
    //     return $this->morphMany(Kabar::class, 'related');
    // }
}
