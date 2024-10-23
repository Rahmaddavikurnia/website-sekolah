<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Humas;
use App\Models\Kabar;
use App\Models\Kesiswaan;
use App\Models\Kurikulum;
use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KabarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kabars = Kabar::orderBy('id', 'ASC')->paginate(10);
        return view('admin.kabar.dashboard',compact('kabars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $humas = Humas::all();
        // $saranas = Sarana::all();
        // $kurikulums = Kurikulum::all();
        // $kesiswaans = Kesiswaan::all();
        return view('admin.kabar.create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'judul_kabar' => 'required',
            'isi_kabar' => 'required',
            'tanggal_terbit' => 'required|date',
            'tanggal_berlaku' => 'nullable|date',
            'related_type' => 'nullable', // Menentukan jenis relasi (Sarana, Humas, dsb)
            // 'related_id' => 'required', // Menentukan ID relasi (ID dari tabel Sarana, Humas, dsb)
        ]);

        $file = $request->file('gambar');
        $name=$file->getClientOriginalName();
        $path='storage/images/kabar';
        $file->move($path,$name);
        $gambar = $name;

        $slug = Str::of($request->judul_kabar)->slug('-');
        $kabar = Kabar::create([
            'judul_kabar'=>$request->judul_kabar,
            'slug'=>$slug,
            'isi_kabar'=>$request->isi_kabar,
            'tanggal_terbit'=>$request->tanggal_terbit,
            'related_type'=>$request->related_type,
            'tanggal_berlaku'=>$request->tanggal_berlaku,
            'gambar'=>$gambar,
        ]);

        // Tentukan relasi polymorphic
        // $relatedModel = $this->getRelatedModel($request->related_type);
        // $relatedInstance = $relatedModel::find($request->related_id);

        // // Simpan dengan relasi polymorphic
        // $relatedInstance->kabars()->save($kabar);

        if($kabar){
            return redirect()->route('kabar-dashboard')->with('success', 'Kabar berhasil ditambahkan.');
        } else {
            return redirect()->route('kabar-dashboard')->with('Error', 'Kabar Gagal ditambahkan.');
        }
    }

    // // private function showRelated(Kabar $kabars)
    // // {
    // //     switch ($kabars->related_type) {
    // //         case 'sarana':
    // //             return Sarana::class;
    // //             break;
    // //         case 'humas':
    // //             return Humas::class;
    // //             break;
    // //         case 'kurikulum':
    // //             return Kurikulum::class;
    // //             break;
    // //         case 'kesiswaan':
    // //             return Kesiswaan::class;
    // //             break;
    // //         default:
    // //             throw new \Exception('Invalid related type');
    // //     }
    // }


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $kabars = Kabar::where('slug', $slug)->firstOrFail();

        return view('', compact('kabars'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kabars = Kabar::find($id);
        // $humas = Humas::all();
        // $saranas = Sarana::all();
        // $kurikulums = Kurikulum::all();
        // $kesiswaans = Kesiswaan::all();
        return view('admin.kabar.edit',compact('kabars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_kabar' => 'required',
            'isi_kabar' => 'required',
            'tanggal_terbit' => 'required|date',
            'tanggal_berlaku' => 'nullable|date',
            'related_type' => 'nullable',
            // 'related_id' => 'required',
        ]);

        $kabars = Kabar::findOrFail($id);
        $slug = Str::of($request->judul_kabar)->slug('-');

        if($request->file('gambar')){

            $file=$request->file('gambar');
            unlink('storage/images/kabar/'.$kabars->gambar);
            $name=$file->getClientOriginalName();
            $path= 'storage/images/kabar/';
            $file->move($path,$name);
            $kabars['gambar'] = $name;
        }

        $kabars->judul_kabar = $request->judul_kabar;
        $kabars->slug = $slug;
        $kabars->isi_kabar = $request->isi_kabar;
        $kabars->tanggal_terbit = $request->tanggal_terbit;
        $kabars->tanggal_berlaku = $request->tanggal_berlaku;
        $kabars->related_type = $request->related_type;

        // Update relasi polymorphic
        // $relatedModel = $this->getRelatedModel($request->related_type);
        // $relatedInstance = $relatedModel::find($request->related_id);

        // Update relasi
        // $kabars->related()->associate($relatedInstance);
        $kabars->save();

        return redirect()->route('kabar-dashboard')->with('success', 'Kabar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabar $kabars)
    {
        $gambarPath = 'storage/images/kabar/' .$kabars->gambar;
        unlink($gambarPath);

        $kabars->delete();

        return redirect('/kabar-dashboard')->with('Success','Kabar Berhasil di Hapus');
    }
}
