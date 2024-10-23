<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Humas;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HumasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $humass = Humas::orderBy('id', 'ASC')->paginate(10);
        return view('admin.humas.dashboard',compact('humass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.humas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'tempat' => 'required',
            'pihak_terkait' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Jika ingin upload gambar
        ]);

        
        $file = $request->file('gambar');
        $name=$file->getClientOriginalName();
        $path='storage/images/humas';
        $file->move($path,$name);
        $gambar = $name;

        $slug = Str::of($request->judul_kegiatan)->slug('-');
        $humass = Humas::create([
            'judul_kegiatan'=>$request->judul_kegiatan,
            'slug'=>$slug,
            'deskripsi_kegiatan'=>$request->deskripsi_kegiatan,
            'tanggal_kegiatan'=>$request->tanggal_kegiatan,
            'tempat'=>$request->tempat,
            'pihak_terkait'=>$request->tempat_terkait,
            'gambar'=>$gambar,
        ]);

        if($humass){
            return redirect('/humas-dashboard')->with('Success','Data Humas berhasil di Tambah');
        } else {
            return redirect('/humas-create')->with('Error','Data Humas Gagal di Tambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Humas $humas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $humas = Humas::find($id);
        return view('admin.humas.edit',compact('humas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_kegiatan' => 'required',
            'deskripsi_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required|date',
            'tempat' => 'required',
            'pihak_terkait' => 'nullable',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $update = Humas::findOrFail($id);
        $slug = Str::of($request->judul_kegiatan)->slug('-');

        if($request->file('gambar')){

            $file=$request->file('gambar');
            unlink('storage/images/humas/'.$update->gambar);
            $name=$file->getClientOriginalName();
            $path= 'storage/images/humas/';
            $file->move($path,$name);
            $update['gambar'] = $name;
        } 

        $update->judul_kegiatan = $request->judul_kegiatan;
        $update->slug = $slug;
        $update->deskripsi_kegiatan = $request->deskripsi_kegiatan;
        $update->tanggal_kegiatan = $request->tanggal_kegiatan;
        $update->tempat = $request->tempat;
        $update->pihak_terkait = $request->pihak_terkait;

        $update->save();

        if($update){
            return redirect('/humas-dashboard')->with('Success','Data Humas berhasil di Ubah');
        } else {
            return redirect('/humas-update')->with('Error','Data Humas Gagal di Ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Humas $humas)
    {
        $gambarPath = 'storage/images/humas' .$humas->gambar;
        unlink($gambarPath);

        $humas->delete();

        return redirect('/humas-dashboad')->with('Success','Data Berhasil di Hapus');
    }
}
