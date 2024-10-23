<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Kesiswaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KesiswaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kesiswaans = Kesiswaan::with('jurusans')->orderBy('id', 'ASC')->paginate(10);
        $jurusans = Jurusan::all();
        return view('admin.kesiswaan.dashboard',compact('kesiswaans','jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.kesiswaan.create',compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama_program'=>'required',
            'deskripsi_program'=>'required',
            'jurusan_ids' => 'required|array',
            'jurusan_ids.*' => 'exists:jurusans,id',
        ]);

        if($validator->fails()){
            return redirect('/kesiswaan-dashboard')->withErrors($validator)->withInput();
        }

        
        $file = $request->file('foto_program');
        $name=$file->getClientOriginalName();
        $path='storage/images/kesiswaan';
        $file->move($path,$name);
        $foto_program = $name;
        
        $file = $request->file('foto_anggota');
        $name=$file->getClientOriginalName();
        $path='storage/images/kesiswaan';
        $file->move($path,$name);
        $foto_anggota = $name;

        $slug = Str::of($request->nama_program)->slug('-');
        $kesiswaans = Kesiswaan::create([
            'nama_program'=>$request->nama_program,
            'slug'=>$slug,
            'deskripsi_program'=>$request->deskripsi_program,
            'penanggung_jawab'=>$request->penanggung_jawab,
            'foto_program'=>$foto_program,
            'foto_anggota'=>$foto_anggota,
        ]);
        $kesiswaans->jurusans()->attach($request->jurusan_ids);

        if($kesiswaans){
            return redirect('/kesiswaan-dashboard')->with('Success','Data Kesiswaan berhasil di Tambah');
        } else {
            return redirect('/kesiswaan-create')->with('Error','Data Kesiswaan Gagal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kesiswaan $kesiswaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kesiswaans = Kesiswaan::with('jurusans')->find($id);
        $jurusans = Jurusan::all();
        $selectedJurusanIds = $kesiswaans->jurusans->pluck('id')->toArray();
        return view('admin.kesiswaan.edit',compact('kesiswaans','jurusans','selectedJurusanIds'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama_program'=>'required',
            'deskripsi_program'=>'required',
            // 'jurusan_ids' => 'required|array',
            // 'jurusan_ids.*' => 'exists:jurusan,id',
        ]);

        if($validator->fails()){
            return redirect('/kesiswaan-dashboard')->withErrors($validator)->withInput();
        }

        $update = Kesiswaan::findOrFail($id);
        $slug = Str::of($request->nama_program)->slug('-');


        if($request->file('foto_program')){

            $file=$request->file('foto_program');
            unlink('storage/images/kesisiwaan/'.$update->foto_program);
            $name=$file->getClientOriginalName();
            $path= 'storage/images/kesisiwaan/';
            $file->move($path,$name);
            $kabars['foto_program'] = $name;
        }
       
        if($request->file('foto_anggota')){

            $file=$request->file('foto_anggota');
            unlink('storage/images/kesisiwaan/'.$update->foto_anggota);
            $name=$file->getClientOriginalName();
            $path= 'storage/images/kesisiwaan/';
            $file->move($path,$name);
            $kabars['foto_anggota'] = $name;
        }


        $update->nama_program = $request -> nama_program;
        $update->deskripsi_program = $request -> deskripsi_program;
        $update->penanggung_jawab = $request -> penanggung_jawab;
        $update->jurusans()->sync($request->jurusan_ids);
        $update->slug = $slug;

        $update->save();

        if ($update) {
            return redirect('/kesiswaan-dashboard')->with('success', 'Berhasil Memperbarui Kesiswaan');
        } else {
            return redirect('/kesiswaan-create')->with('error', 'Gagal Memperbarui Kesiswaan');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kesiswaan $kesiswaans)
    {
        $foto_anggotaPath = 'storage/images/kesiswaan/'.$kesiswaans->foto_program;
        $foto_programPath = 'storage/images/kesiswaan/'.$kesiswaans->foto_anggota;
        unlink($foto_programPath);
        unlink($foto_anggotaPath);

        $kesiswaans->delete();

        return redirect('/kesiswaan-dashboard')->with('Succes','Data Kesiswaan Berhasil di Hapus');
    }
}
