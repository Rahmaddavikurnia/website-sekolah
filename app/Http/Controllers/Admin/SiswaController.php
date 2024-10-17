<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = Siswa::with('jurusan','kelas')->orderByRaw('id = 1 DESC')->latest()->paginate(10);
        return view('admin.siswa.dashboard',compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        return view('admin.siswa.create',compact('jurusans','kelas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'nisn'=>'required',
            'jurusan_id'=>'required',
            'kelas_id'=>'required',
        ]);

        if($validator->fails()){
            return redirect('/siswa-create')->withErrors($validator)->withInput();
        }

        $siswas = Siswa::create([
            'nama'=>$request->nama,
            'nisn'=>$request->nisn,
            'jurusan_id'=>$request->jurusan_id,
            'kelas_id'=>$request->kelas_id,
        ]);

        if($siswas){
            return redirect('/siswa-dashboard')->with('Success','Data siswa berhasil di Tambah');
        } else {
            return redirect('/siswa-dashboard')->with('Error','Data siswa Gagal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswas = Siswa::with('jurusan','kelas')->find($id);
        $jurusans = Jurusan::all();
        $kelas = Kelas::all();
        return view('admin.siswa.edit',compact('siswas','jurusans','kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'nisn'=>'required',
            'jurusan_id'=>'required',
            'kelas_id'=>'required',
        ]);

        if($validator->fails()){
            return redirect('/siswa-update')->withErrors($validator)->withInput();
        }

        $update = Siswa::findOrFail($id);

        $update->nama = $request -> nama;
        $update->nisn = $request -> nisn;
        $update->jurusan_id = $request -> jurusan_id;
        $update->kelas_id = $request -> kelas_id;

        $update->save();

        if ($update) {
            return redirect('/siswa-dashboard')->with('success', 'Berhasil Memperbarui siswa');
        } else {
            return redirect('/siswa-dashboard')->with('error', 'Gagal Memperbarui siswa');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswas)
    {
        $siswas->delete();

        return redirect('/siswa-dashboard')->with('success','Berhasl menghapus perusahaan');
    }
}
