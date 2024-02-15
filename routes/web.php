<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\services\DosenService as ServicesDosenService;
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

            Route::controller(ServicesDosenService::class)->group(function () {
                // Service CRUD
                Route::get("/insert", "insertView")->name("dosen-create-index");
                Route::get("/update/{id}", "updateView")->name("dosen-update-index");

                Route::get("/delete/{id}", "delete")->name("dosen-delete");
                Route::post("/insert", "insert")->name("dosen-insert");
                Route::post("/update", "update")->name("dosen-update");
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
