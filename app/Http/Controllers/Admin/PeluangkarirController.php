<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Peluangkarir;
use Illuminate\Http\Request;

class PeluangkarirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peluangkarirs = Peluangkarir::with('jurusan')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.karir.dashboard',compact('peluangkarirs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.karir.create',compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',
            'nama' => 'required|string|max:255',
        ]);

        $peluangkarirs = Peluangkarir::create([
            'jurusan_id' => $request -> jurusan_id,
            'nama' => $request -> nama,
        ]);

        if($peluangkarirs){
            return redirect('/peluangkarir-dashboard')->with('Success','Peluang Karir Berhasil di Tambah');
        } else {
            return redirect('/peluangkarir-create')->with('Error','Data Gagal di Tambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Peluangkarir $peluangkarir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peluangkarirs = Peluangkarir::with('jurusan')->find($id);
        $jurusans = Jurusan::all();
        return view('admin.karir.edit',compact('peluangkarirs','jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $update = Peluangkarir::findOrFail($id);

        $update->nama = $request -> nama;
        $update->jurusan_id = $request -> jurusan_id;

        $update->save();

        if($update){
            return redirect('/peluangkarir-dashboard')->with('Success','Data Berhasil di perbarui');
        } else {
            return redirect('/peluangkarir-update')->with('Error','Data Gagal di Perbarui');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peluangkarir $peluangkarirs)
    {
        $peluangkarirs->delete();

        
        if($peluangkarirs){
            return redirect('/peluangkarir-dashboard')->with('Success','Data Berhasil di Hapus');
        } else {
            return redirect('/peluangkarir-dashboard')->with('Error','Data Gagal di Hapus');
        }
    }
}
