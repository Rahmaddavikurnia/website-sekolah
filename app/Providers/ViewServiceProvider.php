<?php

namespace App\Providers;

use App\Models\Jurusan;
use App\Models\Kesiswaan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('jurusans', Jurusan::all());
        View::share('kesiswaans', Kesiswaan::all());
    }
}
