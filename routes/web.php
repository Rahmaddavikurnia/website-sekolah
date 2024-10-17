<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\HumasController;
use App\Http\Controllers\Auth\SesiController;
use App\Http\Controllers\Admin\JurusanController;
use App\Http\Controllers\Admin\KabarController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KesiswaanController;
use App\Http\Controllers\Admin\KurikulumController;
use App\Http\Controllers\Admin\PeluangkarirController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\SaranaController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\VisimisiController;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('frontend.layouts.home-view');
// });

Route::middleware(['guest'])->group(function(){
    Route::post('/login',[SesiController::class,'login'])->name('login');
    Route::get('/login',[SesiController::class,'index']);
    Route::get('/register',[SesiController::class,'regis'])->name('regis');
    Route::post('/register',[SesiController::class,'register'])->name('register');
});

Route::middleware(['auth'])->group(function(){
    Route::post('/logout',[SesiController::class,'logout'])->name('logout');
});

Route::middleware(['admin'])->group(function(){

Route::controller(JurusanController::class)->group(function(){
    Route::get('/jurusan-dashboard-admin','index')->name('j.dashboard');
    Route::get('/jurusan-create','create_jurusan')->name('j.create');
    Route::post('/jurusan-create','store')->name('j.store');
    Route::get('/jurusan-update/{jurusans}','edit_jurusan')->name('j.edit');
    Route::patch('/jurusan-update/{jurusans}','update')->name('j.update');
    Route::delete('/jurusan-delete/{jurusans}','destroy')->name('j.destroy');
});

Route::controller(KelasController::class)->group(function(){
    Route::get('/kelas-dashboard-admin','index')->name('kelas-dashboard');
    Route::get('/kelas-create','create')->name('kelas-create');
    Route::post('/kelas-create','store')->name('kelas-store');
    Route::get('/kelas-edit/{kelas}','edit')->name('kelas-edit');
    Route::patch('/kelas-edit/{kelas}','update')->name('kelas-update');
    Route::delete('/kelas-delete/{kelas}','destroy')->name('kelas-delete');
});

Route::controller(KesiswaanController::class)->group(function(){
    Route::get('/kesiswaan-dashboard','index')->name('kesiswaan-dashboard');
    Route::get('/kesiswaan-create','create')->name('kesiswaan-create');
    Route::post('/kesiswaan-create','store')->name('kesiswaan-store');
    Route::get('/kesiswaan-update/{kesiswaans}','edit')->name('kesiswaan-edit');
    Route::patch('/kesiswaan-update/{kesiswaans}','update')->name('kesiswaan-update');
    Route::delete('/kesiswaan-delete/{kesiswaans}','destroy')->name('kesiswaan-delete');
});

Route::controller(KurikulumController::class)->group(function(){
    Route::get('/kurikulum-dashboard','index')->name('kurikulum-dashboard');
    Route::get('/kurikulum-create','create')->name('kurikulum-create');
    Route::post('/kurikulum-create','store')->name('kurikulum-store');
    Route::get('/kurikulum-update/{kurikulums}','edit')->name('kurikulum-edit');
    Route::patch('/kurikulum-update/{kurikulums}','update')->name('kurikulum-update');
    Route::delete('/kurikulum-delete/{kurikulums}','destroy')->name('kurikulum-delete');
});

Route::controller(SaranaController::class)->group(function(){
    Route::get('/sarana-dashboard','index')->name('sarana-dashboard');
    Route::get('/sarana-create','create')->name('sarana-create');
    Route::post('/sarana-create','store')->name('sarana-store');
    Route::get('/sarana-update/{saranas}','edit')->name('sarana-edit');
    Route::patch('/sarana-update/{saranas}','update')->name('sarana-update');
    Route::delete('/sarana-delete/{saranas}','destroy')->name('sarana-delete');
});

Route::controller(HumasController::class)->group(function(){
    Route::get('/humas-dashboard','index')->name('humas-dashboard');
    Route::get('/humas-create','create')->name('humas-create');
    Route::post('/humas-create','store')->name('humas-store');
    Route::get('/humas-update/{humas}','edit')->name('humas-edit');
    Route::patch('/humas-update/{humas}','update')->name('humas-update');
    Route::delete('/humas-delete/{humas}','destroy')->name('humas-delete');
});

Route::controller(KabarController::class)->group(function(){
    Route::get('/kabar-dashboard','index')->name('kabar-dashboard');
    Route::get('/kabar-create','create')->name('kabar-create');
    Route::post('/kabar-create','store')->name('kabar-store');
    Route::get('/kabar-update/{kabars}','edit')->name('kabar-edit');
    Route::patch('/kabar-update/{kabars}','update')->name('kabar-update');
    Route::delete('/kabar-delete/{kabars}','destroy')->name('kabar-delete');
});

// Route::controller(::class)->group(function(){
//     Route::get('/-dashboard','index')->name('-dashboard');
//     Route::get('/-create','create')->name('-create');
//     Route::post('/-create','store')->name('-store');
//     Route::get('/-update/{kabars}','edit')->name('-edit');
//     Route::patch('/-update/{kabars}','update')->name('-update');
//     Route::delete('/-delete/{kabars}','destroy')->name('-delete');

Route::controller(PrestasiController::class)->group(function(){
    Route::get('/prestasi-dashboard','index')->name('prestasi-dashboard');
    Route::get('/prestasi-create','create')->name('prestasi-create');
    Route::post('/prestasi-create','store')->name('prestasi-store');
    Route::get('/prestasi-update/{kabars}','edit')->name('prestasi-edit');
    Route::patch('/prestasi-update/{kabars}','update')->name('prestasi-update');
    Route::delete('/prestasi-delete/{kabars}','destroy')->name('prestasi-delete');
});

Route::get('/siswa/search', function (Request $request) {
    $query = $request->get('query');

    $siswa = Siswa::where('nama', 'LIKE', "%{$query}%")
                  ->select('id', 'nama') // Pastikan hanya mengambil id dan nama
                  ->get();

    return response()->json($siswa);
});

Route::controller(SiswaController::class)->group(function(){
    Route::get('/siswa-dashboard','index')->name('siswa-dashboard');
    Route::get('/siswa-create','create')->name('siswa-create');
    Route::post('/siswa-create','store')->name('siswa-store');
    Route::get('/siswa-update/{siswas}','edit')->name('siswa-edit');
    Route::patch('/siswa-update/{siswas}','update')->name('siswa-update');
    Route::delete('/siswa-delete/{siswas}','destroy')->name('siswa-delete');
});

Route::controller(PeluangkarirController::class)->group(function(){
    Route::get('/peluangkarir-dashboard','index')->name('peluangkarir-dashboard');
    Route::get('/peluangkarir-create','create')->name('peluangkarir-create');
    Route::post('/peluangkarir-create','store')->name('peluangkarir-store');
    Route::get('/peluangkarir-update/{peluangkarirs}','edit')->name('peluangkarir-edit');
    Route::patch('/peluangkarir-update/{peluangkarirs}','update')->name('peluangkarir-update');
    Route::delete('/peluangkarir-delete/{peluangkarirs}','destroy')->name('peluangkarir-delete');
});

Route::controller(ArtikelController::class)->group(function(){
    Route::get('/artikel-dashboard','index')->name('artikel-dashboard');
    Route::get('/artikel-create','create')->name('artikel-create');
    Route::post('/artikel-create','store')->name('artikel-store');
    Route::get('/artikel-update/{artikels}','edit')->name('artikel-edit');
    Route::patch('/artikel-update/{artikels}','update')->name('artikel-update');
    Route::delete('/artikel-delete/{artikels}','destroy')->name('artikel-delete');
});

Route::controller(GuruController::class)->group(function(){
    Route::get('/guru-dashboard','index')->name('guru-dashboard');
    Route::get('/guru-create','create')->name('guru-create');
    Route::post('/guru-create','store')->name('guru-store');
    Route::get('/guru-update/{gurus}','edit')->name('guru-edit');
    Route::patch('/guru-update/{gurus}','update')->name('guru-update');
    Route::delete('/guru-delete/{gurus}','destroy')->name('guru-delete');
});

Route::controller(AdminController::class)->group(function(){
    Route::get('/home-admin','home_admin')->name('home-admin');
});

});
