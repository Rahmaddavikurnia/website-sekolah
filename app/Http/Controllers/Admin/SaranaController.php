<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sarana;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SaranaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $saranas = Sarana::orderBy('id', 'ASC')->paginate(10);
        return view('admin.sarana.dashboard',compact('saranas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sarana.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Jika ingin upload gambar
        ]);

        $file = $request->file('gambar');
        $name=$file->getClientOriginalName();
        $path='storage/images/sarana';
        $file->move($path,$name);
        $gambar = $name;

        $slug = Str::of($request->nama)->slug('-');
        $saranas = Sarana::create([
            'nama'=>$request->nama,
            'slug'=>$slug,
            'deskripsi'=>$request->deskripsi,
            'lokasi'=>$request->lokasi,
            'kapasitas'=>$request->kapasitas,
            'gambar'=>$gambar,
        ]);

        
        if($saranas){
            return redirect('/sarana-dashboard')->with('Success','Data Sarana berhasil di Tambah');
        } else {
            return redirect('/sarana-create')->with('Error','Data Sarana Gagal di Tambah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Sarana $sarana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $saranas = Sarana::find($id);
        return view('admin.sarana.edit',compact('saranas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sarana' => 'required',
            'deskripsi' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'nullable|integer',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $update = Sarana::findOrFail($id);
        $slug = Str::of($request->nama)->slug('-');

        if($request->file('gambar')){

            $file=$request->file('gambar');
            unlink('storage/images/sarana/'.$update->gambar);
            $name=$file->getClientOriginalName();
            $path= 'storage/images/sarana/';
            $file->move($path,$name);
            $update['gambar'] = $name;
        }

        $update->nama = $request -> nama;
        $update->slug = $slug;
        $update->deskripsi = $request -> deskripsi;
        $update->lokasi = $request -> lokasi;
        $update->kapasitas = $request -> kapasitas;

        $update->save();

        
        if($update){
            return redirect('/sarana-dashboard')->with('Success','Data Sarana berhasil di Ubah');
        } else {
            return redirect('/sarana-update')->with('Error','Data Sarana Gagal di Ubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sarana $saranas)
    {
        $gambarPath = 'storage/images/sarana' .$saranas->gambar;
        unlink($gambarPath);

        $saranas->delete();

        return redirect('/sarana-dashoard')->with('Success','Data Sarana Berhasul di Hapus');
    }
}
