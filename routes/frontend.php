<?php

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;


Route::controller(HomeController::class)->group(function(){
    Route::get('/','homeutama')->name('home');
    Route::get('/visi-misi','visimisi')->name('visi-misi');
    Route::get('/guru-staf','guru')->name('guru-staf');
    Route::get('/semua-kabar','allkabar')->name('all-kabar');
    Route::get('/semua-artikel','allartikel')->name('all-artikel');
    Route::get('/semua-prestasi','allprestasi')->name('all-prestasi');
    Route::get('/semua-humas','allhumas')->name('all-humas');
    Route::get('/kurikulum','kurikulum')->name('kurikulum-view');
    Route::get('/sarana','sarana')->name('all-sarana');
    Route::get('/kontak','kontak')->name('kontak-view');

});

Route::controller(FrontendController::class)->group(function(){
    Route::get('/kabar/{slug}','showkabar')->name('detail-kabar');
    Route::get('/artikel/{slug}','showartikel')->name('detail-artikel');
    Route::get('/jurusan/{slug}','showjurusans')->name('detail-jurusan');
    Route::get('/sarana/{slug}','showsarana')->name('detail-sarana');
    Route::get('/prestasi/{slug}','showprestasi')->name('detail-prestasi');
    Route::get('/humas/{slug}','showhumas')->name('detail-humas');
    Route::get('/kesiswaan/{slug}','showkesiswaan')->name('detail-kesiswaan');
    Route::post('/kontak','kirimsaran')->name('kirimsaran');
    Route::post('/comments', 'comment')->name('comment');
    Route::delete('/comments/{id}', 'commentdelete')->name('comment-destroy');
    Route::get('/search','search')->name('search');
});