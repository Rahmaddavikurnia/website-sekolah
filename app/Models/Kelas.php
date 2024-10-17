<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 
        'jurusan_id',
        'nama_kelas',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
    
    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }
}
