<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            return auth()->user()->role->name === 'Administrator';
        });

        Blade::if('calon_mahasiswa', function () {
            return auth()->user()->role->name === 'Calon Mahasiswa';
        });

        Blade::if('dosen', function () {
            return auth()->user()->role->name === 'Dosen';
        });

        Blade::if('staf_penerimaan', function () {
            return auth()->user()->role->name === 'Staf Penerimaan';
        });

        Blade::if('pegawai_administrasi', function () {
            return auth()->user()->role->name === 'Pegawai Administrasi';
        });

        Blade::if('mahasiswa', function () {
            return auth()->user()->role->name === 'Mahasiswa';
        });
    }
}
