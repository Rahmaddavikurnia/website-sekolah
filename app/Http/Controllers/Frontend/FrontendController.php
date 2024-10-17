<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SaranEmail;
use App\Models\Artikel;
use App\Models\Comment;
use App\Models\Humas;
use App\Models\Jurusan;
use App\Models\Kabar;
use App\Models\Kesiswaan;
use App\Models\Prestasi;
use App\Models\Saran;
use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function showkabar($slug)
    {
        $kabars = Kabar::where('slug', $slug)->firstOrFail();
        $previousKabar = Kabar::where('id', '<', $kabars->id)->orderBy('id', 'desc')->first();
        $nextKabar = Kabar::where('id', '>', $kabars->id)->orderBy('id')->first();
        $relatedKabars = Kabar::where('related_type', $kabars->related_type)
                              ->where('id', '!=', $kabars->id) 
                              ->take(5) 
                              ->get();
        if ($relatedKabars->isEmpty()) {
            $relatedKabars = Kabar::where('id', '!=', $kabars->id)->take(5)->get();
        }
        return view('frontend.detail.detail-kabar', compact('kabars','previousKabar','nextKabar','relatedKabars'));
    }

    public function showsarana($slug)
    {
        $saranas = Sarana::where('slug', $slug)->firstOrFail();
        $previoussarana = Sarana::where('id', '<', $saranas->id)->orderBy('id', 'desc')->first();
        $nextsarana = Sarana::where('id', '>', $saranas->id)->orderBy('id')->first();
        $relatedsaranas = Sarana::where('id', '!=', $saranas->id) 
                              ->take(3) 
                              ->get();
        if ($relatedsaranas->isEmpty()) {
            $relatedsaranas = Sarana::where('id', '!=', $saranas->id)->take(5)->get();
        }
        return view('frontend.detail.detail-sarana', compact('saranas','previoussarana','nextsarana','relatedsaranas'));
    }

    public function showartikel($slug)
    {
        $artikels = Artikel::where('slug',$slug)->firstOrFail();
        $previousArtikel = Artikel::where('id', '<', $artikels->id)->orderBy('id', 'desc')->first();
        $nextArtikel = Artikel::where('id', '>', $artikels->id)->orderBy('id')->first();
        $relatedArtikels = Artikel::where('kategori_type', $artikels->kategori_type)
                              ->where('id', '!=', $artikels->id) 
                              ->take(5) 
                              ->get();
        if ($relatedArtikels->isEmpty()) {
            $relatedArtikels = Artikel::where('id', '!=', $artikels->id)->take(5)->get();
        }
        return view('frontend.detail.detail-artikel',compact('artikels','previousArtikel','nextArtikel','relatedArtikels'));
    }
   
    public function showprestasi($slug)
    {
        $prestasis = Prestasi::where('slug',$slug)->firstOrFail();
        $previousPrestasi = Prestasi::where('id', '<', $prestasis->id)->orderBy('id', 'desc')->first();
        $nextPrestasi = Prestasi::where('id', '>', $prestasis->id)->orderBy('id')->first();
        $relatedPrestasi = Prestasi::where('id', '!=', $prestasis->id) 
                              ->take(5) 
                              ->get();
        if ($relatedPrestasi->isEmpty()) {
            $relatedPrestasi = Prestasi::where('id', '!=', $prestasis->id)->take(5)->get();
        }
        return view('frontend.detail.detail-prestasi',compact('prestasis','previousPrestasi','nextPrestasi','relatedPrestasi'));
    } 
    
    public function showhumas($slug)
    {
        $humass = Humas::where('slug',$slug)->firstOrFail();
        $previousHumas = Humas::where('id', '<', $humass->id)->orderBy('id', 'desc')->first();
        $nextHumas = Humas::where('id', '>', $humass->id)->orderBy('id')->first();
        $relatedHumas = Humas::where('id', '!=', $humass->id) 
                              ->take(5) 
                              ->get();
        if ($relatedHumas->isEmpty()) {
            $relatedHumas = Humas::where('id', '!=', $humass->id)->take(5)->get();
        }
        return view('frontend.detail.detail-humas',compact('humass','previousHumas','nextHumas','relatedHumas'));
    } 

    public function showjurusans($slug)
    {
        $jurusanss = Jurusan::with('peluangkarir','kurikulum')->where('slug',$slug)->firstOrFail();
        $previousJurusan = Jurusan::where('id', '<', $jurusanss->id)->orderBy('id', 'desc')->first();
        $nextJurusan = Jurusan::where('id', '>', $jurusanss->id)->orderBy('id')->first();
        return view('frontend.detail.detail-jurusan',compact('jurusanss','previousJurusan','nextJurusan'));
    }
    
    public function showkesiswaan($slug)
    {
        $kesiswaanss = Kesiswaan::with('jurusans')->where('slug',$slug)->firstOrFail();
        $previousKesiswaan = Kesiswaan::where('id', '<', $kesiswaanss->id)->orderBy('id', 'desc')->first();
        $nextKesiswaan = Kesiswaan::where('id', '>', $kesiswaanss->id)->orderBy('id')->first();
        return view('frontend.detail.detail-kesiswaan',compact('kesiswaanss','previousKesiswaan','nextKesiswaan'));
    }

    public function kirimsaran(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        $saran = Saran::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'user_id' => Auth::check() ? Auth::id() : null, 
        ]);

        $schoolEmail = 'krausiaulalaa@gmail.com'; 
        Mail::to($schoolEmail)->send(new SaranEmail($request->all()));

        return redirect()->route('kontak-view')->with('success', 'Saran Anda telah dikirim. Terima kasih!');
    }

    public function comment(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        // $commentable_type = $request->input('commentable_type');
        // $commentable_id = $request->input('commentable_id');

        $comment = new Comment();
        $comment->content = $request->input('content');
        // Cek apakah pengguna login atau tidak
        if (Auth::check()) {
            // Jika login, gunakan ID user yang login
            $comment->user_id = Auth::id();
        } else {
            // Jika tidak login, jangan simpan user_id (nullable)
            $comment->user_id = null;  // Gunakan null jika tidak ada login
        }
        $comment->comentable_id = $request->comentable_id;
        $comment->comentable_type = $request->comentable_type;
        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }

    public function commentdelete($id)
    {
        $comment = Comment::findOrFail($id);
    
        // Cek apakah pengguna sudah terautentikasi
        if (auth()->check()) {
            // Cek apakah pengguna adalah admin atau pemilik komentar
            if (auth()->user()->admin || auth()->user()->id === $comment->user_id) {
                $comment->delete(); // Menghapus komentar
                return redirect()->back()->with('success', 'Komentar berhasil dihapus!');
            }
    
            // Jika tidak memiliki izin
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
        }
    
        // Jika pengguna tidak terautentikasi
        return redirect()->back()->with('error', 'Anda harus login untuk menghapus komentar.');
    }

    public function search(Request $request)
    {
        // Ambil kata kunci dari input pencarian
        $keyword = $request->input('keyword');

        // Lakukan pencarian di tabel Artikel, Kabar, dan Prestasi
        $articles = Artikel::where('judul_artikel', 'LIKE', "%$keyword%")
                    ->orWhere('isi_artikel', 'LIKE', "%$keyword%")
                    ->get();

        $kabar = Kabar::where('judul_kabar', 'LIKE', "%$keyword%")
                    ->orWhere('isi_kabar', 'LIKE', "%$keyword%")
                    ->get();

        $prestasi = Prestasi::where('title', 'LIKE', "%$keyword%")
                    ->orWhere('deskripsi', 'LIKE', "%$keyword%")
                    ->get();

        // Gabungkan hasil pencarian
        $results = collect([$articles, $kabar, $prestasi])->flatten();

        // Jika hanya satu hasil ditemukan, redirect langsung ke halaman detail
        if ($results->count() === 1) {
            $result = $results->first();

            if ($result instanceof Artikel) {
                return redirect()->route('detail-artikel', $result->id);
            } elseif ($result instanceof Kabar) {
                return redirect()->route('detail-kabar', $result->id);
            } elseif ($result instanceof Prestasi) {
                return redirect()->route('detail-prestasi', $result->id);
            }
        }

        // Jika lebih dari satu hasil ditemukan, tampilkan halaman hasil pencarian
        return view('cari-hasil', compact('results', 'keyword'));
    }

}
