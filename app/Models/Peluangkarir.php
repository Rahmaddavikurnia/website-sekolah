<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peluangkarir extends Model
{
    use HasFactory;

    protected $fillable = ['jurusan_id', 'nama'];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }
}
