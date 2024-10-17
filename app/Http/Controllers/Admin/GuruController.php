<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::with('jurusans')->orderByRaw('id = 1 DESC')->latest()->paginate(10);
        $jurusans = Jurusan::all();
        return view('admin.guru.dashboard', compact('gurus', 'jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.guru.create', compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable',
            'jurusan_ids' => 'required|array',
            'jurusan_ids.*' => 'exists:jurusans,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Jika ingin upload gambar
        ]);

        $file = $request->file('gambar');
        $name=$file->getClientOriginalName();
        $path='storage/images/guru';
        $file->move($path,$name);
        $gambar = $name;

        $guru = Guru::create([
            'nama'=>$request->nama,
            'jabatan'=>$request->jabatan,
            'gambar'=>$gambar,
        ]);
        $guru->jurusans()->attach($request->jurusan_ids);

        return redirect()->route('guru-dashboard')->with('success', 'Guru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru $guru)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $gurus = Guru::find($id);
        $jurusans = Jurusan::all();
        return view('admin.guru.edit',compact('gurus','jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required',
            'jurusan_ids' => 'required|array',
            'jurusan_ids.*' => 'exists:jurusan,id',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Jika ingin upload gambar
        ]);

        $update = Guru::findOrFail($id);

        if($request->file('gambar')){

            $file=$request->file('gambar');
            unlink('storage/images/guru/'.$update->gambar);
            $name=$file->getClientOriginalName();
            $path= 'storage/images/guru/';
            $file->move($path,$name);
            $update['gambar'] = $name;
        } 

        $update->nama = $request->nama;
        $update->jabatan = $request->jabatan;
        $update->jurusans()->sync($request->jurusan_ids);
        $update->save();

        if($update){
            return redirect('/guru-dashboard')->with('Success','Data Guru berhasil di Ubah');
        } else {
            return redirect('/guru-update')->with('Error','Data Guru Gagal di Ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $gurus)
    {
        $gambarPath = 'storage/images/guru' .$gurus->gambar;
        unlink($gambarPath);

        $gurus->delete();

        return redirect('/guru-dashboard')->with('Success','Berhasil Menghapus Data');
    }
}
