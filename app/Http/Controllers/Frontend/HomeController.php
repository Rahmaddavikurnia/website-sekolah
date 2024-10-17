<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Guru;
use App\Models\Humas;
use App\Models\Jurusan;
use App\Models\Kabar;
use App\Models\Kurikulum;
use App\Models\Prestasi;
use App\Models\Sarana;

class HomeController extends Controller
{
    public function homeutama()
    {
        $kabarnew = Kabar::latest()->take(3)->get();
        $artikelnew = Artikel::latest()->take(3)->get();
        $prestasis = Prestasi::latest()->take(6)->get();
        return view('frontend.layouts.home-view',compact('kabarnew','artikelnew','prestasis'));
    }
    
    public function kurikulum()
    {
        $jurusanIds = [
            'pplg' => 1, // Ganti dengan ID jurusan PPLG
            'tjkt' => 2, // Ganti dengan ID jurusan TJKT
            'dkv' => 3,  // Ganti dengan ID jurusan DKV
            'bc' => 4     // Ganti dengan ID jurusan BC
        ];
    
        $kurikulums = [];
        foreach ($jurusanIds as $key => $id) {
            $kurikulums[$key] = Kurikulum::with('jurusan')->where('jurusan_id', $id)->get();
        }
        return view('frontend.layouts.manajemen.kurikulum',compact('kurikulums'));
    }

    public function sarana()
    {
        $saranas = Sarana::latest()->paginate(9);
        return view('frontend.layouts.manajemen.sarana',compact('saranas'));
    }

    public function visimisi()
    {
        return view('frontend.layouts.tentang.visimisi');
    }

    public function allkabar()
    {
        $kabars = Kabar::latest()->paginate(5);
        return view('frontend.layouts.all-kabar',compact('kabars'));
    }

    public function kontak()
    {
        return view('frontend.layouts.kontak');
    }
    
    public function allartikel()
    {
        $artikels = Artikel::latest()->paginate(6);
        return view('frontend.layouts.all-artikel',compact('artikels'));
    }

    public function allprestasi()
    {
        $prestasis = Prestasi::latest()->paginate(6);
        return view('frontend.layouts.all-prestasi',compact('prestasis'));
    }
    
    public function allhumas()
    {   
        $humas = Humas::latest()->paginate(6);
        return view('frontend.layouts.all-humas',compact('humas'));
    }

    public function guru()
    {
        $gurus = Guru::with('jurusans')->get();
        $jurusans = Jurusan::all();
        return view('frontend.layouts.tentang.guru',compact('gurus','jurusans'));
    }

}
