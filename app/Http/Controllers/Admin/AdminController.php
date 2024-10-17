<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kabar;
use App\Models\Prestasi;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function home_admin()
    {
        $jumlahUser = User::count();
        $jumlahKabar = Kabar::count(); 
        $jumlahArtikel = Artikel::count();
        $jumlahPrestasi = Prestasi::count();
        $jumlahSiswa = Siswa::count();
        $total = $jumlahKabar + $jumlahArtikel; 
        return view('admin.home-admin',compact('jumlahUser','jumlahKabar', 'jumlahArtikel', 'total','jumlahPrestasi','jumlahSiswa'));
    }
}
