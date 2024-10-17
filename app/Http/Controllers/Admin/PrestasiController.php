<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestasis = Prestasi::with('siswa')->orderByRaw('id = 1 DESC')->latest()->paginate(10);
        return view('admin.prestasi.dashboard',compact('prestasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswas = Siswa::all();
        return view('admin.prestasi.create',compact('siswas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string',
            'id_siswa' => 'required|array', // Validasi siswa
        ]);

        $file = $request->file('gambar');
        $name=$file->getClientOriginalName();
        $path='storage/images/prestasi';
        $file->move($path,$name);
        $gambar = $name;

        $slug = Str::of($request->title)->slug('-');
        $prestasis = Prestasi::create([
            'title'=>$request->title,
            'slug'=>$slug,
            'deskripsi'=>$request->deskripsi,
            'tanggal'=>$request->tanggal,
            'kategori'=>$request->kategori,
            'gambar'=>$gambar,
        ]);

        $prestasis->siswa()->attach($request->id_siswa);

        return redirect()->route('prestasi-dashboard')->with('success', 'Prestasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestasi $prestasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $prestasis = Prestasi::with('siswa')->findOrFail($id);
        $siswas = Siswa::all(); // Ambil semua siswa
        return view('admin.prestasi.edit', compact('prestasis', 'siswas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Prestasi::findOrFail($id);
        $slug = Str::of($request->title)->slug('-');

        $request->validate([
            'title' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori' => 'nullable|string',
            'id_siswa' => 'required|array', // Validasi siswa
        ]);

        if($request->file('gambar')){

            $file=$request->file('gambar');
            unlink('storage/images/prestasi/'.$update->gambar);
            $name=$file->getClientOriginalName();
            $path= 'storage/images/prestasi/';
            $file->move($path,$name);
            $kabars['gambar'] = $name;
        }

        $update -> title = $request -> title;
        $update -> deskripsi = $request -> deskripsi;
        $update -> tanggal = $request -> tanggal;
        $update -> kategori = $request -> kategori;

        $update->siswa()->sync($request->id_siswa); 
        $update->save();

        return redirect()->route('prestasi-dashboard')->with('success', 'Prestasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestasi $prestasis)
    {
        $gambarPath = 'storage/images/prestasi/' .$prestasis->gambar;
        unlink($gambarPath);

        $prestasis->delete();

        return redirect('/prestasi-dashboard')->with('success','Data berhasil di hapus');
    }
}
