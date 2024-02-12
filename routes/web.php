<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenService;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\RuanganController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::prefix("dashboard")->group(function () {
        Route::get("/", function () {
            return view('dashboard');
        })->name("dashboard");
        // Dosen Class
        Route::prefix("dosen")->group(function () {
            Route::controller(DosenController::class)->group(function () {
                Route::get("/", "index")->name("dosen-index");
            });

            Route::controller(DosenService::class)->group(function () {
                // Service CRUD
            });
        });

        // Gedung Class
        Route::prefix("gedung")->group(function () {
            Route::controller(GedungController::class)->group(function () {
                Route::get("/", "index")->name("gedung-index");
            });
        });

        // Ruanga Class
        Route::prefix("ruangan")->group(function () {
            Route::controller(RuanganController::class)->group(function () {
                Route::get("/", "index")->name("ruangan-index");
            });
        });

        // Kelas Class
        Route::prefix("kelas")->group(function () {
            Route::controller(KelasController::class)->group(function () {
                Route::get("/", "index")->name("kelas-index");
            });
        });

        Route::prefix("jurusan")->group(function () {
            Route::controller(JurusanController::class)->group(function () {
                Route::get("/", "index")->name("jurusan-index");
            });
        });
    });

    // Matakuliah Class
    Route::prefix("mata-kuliah")->group(function () {
        Route::controller(MatakuliahController::class)->group(function () {
            Route::get("/", "index")->name("matkul-index");
        });
    });
});
