<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jabatan',
        'gambar',
    ];

    public function jurusans()
    {
        return $this->belongsToMany(Jurusan::class, 'guru_jurusan');
    }
}
