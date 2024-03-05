<?php

namespace App\Providers;

use App\Models\Dosen;
use App\Models\Gedung;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Kurikulum;
use App\Models\MataKuliah;
use App\Models\Ruangan;
use App\Models\Semester;
use App\Models\Waktu;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(Dosen::class, fn () => new Dosen());
        $this->app->bind(Gedung::class, fn () => new Gedung());
        $this->app->bind(Ruangan::class, fn () => new Ruangan());
        $this->app->bind(Kelas::class, fn () => new Kelas());
        $this->app->bind(Jurusan::class, fn () => new Jurusan());
        $this->app->bind(Kurikulum::class, fn () => new Kurikulum());
        $this->app->bind(MataKuliah::class, fn () => new MataKuliah());
        $this->app->bind(Waktu::class, fn () => new Waktu());
        $this->app->bind(Semester::class, fn () => new Semester());
    }
}
