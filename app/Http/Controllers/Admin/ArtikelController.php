<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artikels = Artikel::with('user')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.artikel.dashboard',compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('admin.artikel.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_artikel' => 'required|string|max:255',
            'isi_artikel' => 'required',
            'tanggal_terbit' => 'required|date',
            'kategori_type' => 'required|string', // Validasi jenis kategori
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $file = $request->file('thumbnail');
        $name=$file->getClientOriginalName();
        $path='storage/images/artikel';
        $file->move($path,$name);
        $thumbnail = $name;
    
        $slug = Str::of($request->judul_artikel)->slug('-');
        Artikel::create([
            'judul_artikel' => $request->judul_artikel,
            'slug'=>$slug,
            'isi_artikel' => $request->isi_artikel,
            'penulis_id' => auth()->id(),
            'tanggal_terbit' => $request->tanggal_terbit,
            'kategori_type' => $request->kategori_type,  // Simpan jenis kategori
            'thumbnail' => $thumbnail,
        ]);
    
        return redirect()->route('artikel-dashboard')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $artikels = Artikel::with('user')->find($id);
        return view('admin.artikel.edit',compact('artikels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_artikel' => 'required|max:255',
            'isi_artikel' => 'required',
            'tanggal_terbit' => 'required|date',
            'kategori_type' => 'required|string', // Validasi jenis kategori
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $artikels = Artikel::findOrFail($id);
        $slug = Str::of($request->judul_artikel)->slug('-');
    
        // if ($request->hasFile('thumbnail')) {
        //     // Hapus gambar lama jika ada
        //     if ($artikel->thumbnail) {
        //         Storage::delete('storage/images/artikel/' . $artikel->thumbnail);
        //     }
    
        //     // Simpan gambar baru
        //     $thumbnailPath = $request->file('thumbnail')->store('storage/images/artikel/');
        //     $thumbnailName = basename($thumbnailPath);
        // } else {
        //     $thumbnailName = $artikel->thumbnail;  // Tetap gunakan gambar lama jika tidak ada yang baru
        // }
        if($request->file('thumbnail')){

            $file=$request->file('thumbnail');
            unlink('storage/images/artikel/'.$artikels->thumbnail);
            $name=$file->getClientOriginalName();
            $path= 'storage/images/artikel/';
            $file->move($path,$name);
            $artikels['thumbnail'] = $name;
        } 
        // Update artikel
    
        $artikels->judul_artikel = $request->judul_artikel;
        $artikels->slug = $slug;
        $artikels->isi_artikel = $request->isi_artikel;
        $artikels->penulis_id = auth()->id();
        $artikels->tanggal_terbit = $request->tanggal_terbit;
        $artikels->kategori_type = $request->kategori_type;  // Simpan jenis kategori
        
        $artikels->save();
    
        return redirect()->route('artikel-dashboard')->with('success', 'Artikel berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikels)
    {
        if ($artikels->thumbnail) {
            Storage::delete('storage/images/artikel/' . $artikels->thumbnail);
        }

        $artikels->delete();

        return redirect('/artikel-dashboard')->with('Success','Artikel berhasil di hapus');
    }
}
