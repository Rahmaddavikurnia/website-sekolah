<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::orderBy('id', 'ASC')->paginate(10);
        return view('admin.jurusan-admin.dashboard',compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create_jurusan()
    {
        return view('admin.jurusan-admin.create-jurusan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $file = $request->file('foto');
        $name=$file->getClientOriginalName();
        $path='storage/jurusan';
        $file->move($path,$name);
        $foto = $name;
       
        $file = $request->file('kegiatan');
        $name=$file->getClientOriginalName();
        $path='storage/jurusan/kegiatan';
        $file->move($path,$name);
        $kegiatan = $name;

        $slug = Str::of($request->nama)->slug('-');
        $jurusan = Jurusan::create([
            'nama'=>$request->nama,
            'slug'=>$slug,
            'deskripsi'=>$request->deskripsi,
            'foto'=>$foto,
            'kegiatan'=>$kegiatan,
        ]);

        if($jurusan) {
            return redirect('/jurusan-dashboard-admin')->with('success','Berhasil Menambahkan Jurusan');
        } else {
            return redirect('/jurusan-create')->with('error','Gagal Menambahkan Jurusan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit_jurusan($id)
    {
        $jurusans = Jurusan::find($id);
        return view('admin.jurusan-admin.edit',compact('jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request -> validate([
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $update = Jurusan::findOrFail($id);
        $slug = Str::of($request->nama)->slug('-');

        // if ($update->user_id !== auth()->id()) {
        //     abort(403, 'Unauthorized action.');
        // }

        if($request->file('foto')){

            $file=$request->file('foto');
            unlink('storage/jurusan/'.$update->foto);
            $name=$file->getClientOriginalName();
            $path= 'storage/jurusan/';
            $file->move($path,$name);
            $update['foto'] = $name;
        }
       
        if($request->file('kegiatan')){

            $file=$request->file('kegiatan');
            unlink('storage/jurusan/kegiatan/'.$update->kegiatan);
            $name=$file->getClientOriginalName();
            $path= 'storage/jurusan/kegiatan/';
            $file->move($path,$name);
            $update['kegiatan'] = $name;
        }

        $update->nama = $request -> nama;
        $update->slug = $slug;
        $update->deskripsi = $request ->deskripsi;

        $update->save();

        if($update) {
            return redirect('/jurusan-dashboard-admin')->with('success','Berhasil Menambahkan Jurusan');
        } else {
            return redirect('/jurusan-update')->with('error','Gagal Menambahkan Jurusan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusans)
    {
        $fotoPath = 'storage/jurusan/' .$jurusans->foto;
        $kegiatanPath = 'storage/jurusan/kegiatan/' .$jurusans->kegiatan;
        unlink($fotoPath);
        unlink($kegiatanPath);

        $jurusans->delete();

        return redirect('/jurusan-dashboard-admin')->with('success','Jurusan berhasil di Hapus');
    }
}
