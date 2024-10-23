<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kurikulum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kurikulums = Kurikulum::with('jurusan')->orderBy('id', 'ASC')->paginate(10);
        return view('admin.kurikulum.dashboard',compact('kurikulums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusans = Jurusan::all();
        return view('admin.kurikulum.create',compact('jurusans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'deskripsi'=>'required',
            'jurusan_id'=>'required',
        ]);

        if($validator->fails()){
            return redirect('/kurikulum-dashboard')->withErrors($validator)->withInput();
        }

        $kurikulums = Kurikulum::create([
           'nama'=>$request->nama,
           'jurusan_id'=>$request->jurusan_id,
           'deskripsi'=>$request->deskripsi,
        ]);

        if($kurikulums){
            return redirect('/kurikulum-dashboard')->with('Success','Data Kurikulum berhasil di tambah');
        } else {
            return redirect('/kurikulum-dashboard')->with('Error','Gagal Menambah data Kurikulum');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Kurikulum $kurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kurikulums = Kurikulum::with('jurusan')->find($id);
        $jurusans = Jurusan::all();
        return view('admin.kurikulum.edit',compact('kurikulums','jurusans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'nama'=>'required',
            'deskripsi'=>'required',
            'jurusan_id'=>'required',
        ]);

        if($validator->fails()){
            return redirect('')->withErrors($validator)->withInput();
        }

        $update = Kurikulum::findOrFail($id);

        $update->nama = $request->nama;
        $update->deskripsi = $request->deskripsi;
        $update->jurusan_id = $request->jurusan_id;

        $update->save();

        if ($update) {
            return redirect('/kurikulum-dashboard')->with('success', 'Berhasil Memperbarui Kesiswaan');
        } else {
            return redirect('/kurikulum-dashboard')->with('error', 'Gagal Memperbarui Kesiswaan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kurikulum $kurikulums)
    {
        $kurikulums->delete();

        return redirect('/kurikulum-dashboard')->with('Succes','Data Kesiswaan Berhasil di Hapus');
    }
}
