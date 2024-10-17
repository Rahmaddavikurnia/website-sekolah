<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelass = Kelas::with('jurusan')->orderByRaw('id = 1 DESC')->latest()->paginate(10);
        return view('admin.kelas.dashboard',compact('kelass'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.kelas.create',compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas'=>'required',
            'jurusan_id'=>'required',
        ]);

        $kelas = Kelas::create([
            'nama_kelas'=>$request->nama_kelas,
            'jurusan_id'=>$request->jurusan_id,
        ]);

        if($kelas) {
            return redirect('/kelas-dashboard-admin')->with('Success','Berhasil Menambahkan Kelas');
        } else {
            return redirect('/kelas-create')->with('error','Gagal Menambahkan Kelas');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelass = Kelas::with('jurusan')->find($id);
        $jurusans = Jurusan::all();
        return view('admin.kelas.edit',compact('kelass','jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas'=>'required',
            'jurusan_id'=>'required',
        ]);

        $update = Kelas::findOrFail($id);

        $update->nama_kelas = $request->nama_kelas;
        $update->jurusan_id = $request->jurusan_id;

        $update->save();

        if($update) {
            return redirect('/kelas-dashboard-admin')->with('success','Berhasil Memperbarui Kelas');
        } else {
            return redirect('/kelas-dashboard-admin')->with('error','Gagal Memperbarui Kelas');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        if($kelas){
            return redirect('/kelas-dashboard-admin')->with('success','Berhasil Menghapus kelas');
        } else {
            return redirect('/kelas-dashboard-admin')->with('error','Gagal Menghapus Kelas');
        }
    }
}
 