<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\GedungController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\services\JurusanService;
use App\Http\Controllers\services\DosenService as ServicesDosenService;
use App\Http\Controllers\services\GedungService;
use App\Http\Controllers\services\JadwalKuliahConstroller;
use App\Http\Controllers\services\KelasService;
use App\Http\Controllers\services\KurikulumService;
use App\Http\Controllers\services\MatkulService;
use App\Http\Controllers\services\RuanganService;
use App\Http\Controllers\services\SemesterService;
use App\Http\Controllers\services\WaktuService;
use App\Http\Controllers\WaktuController;
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
                Route::get("/insert", "insertView")->name("dosen-create-index");
                Route::get("/update/{id}", "updateView")->name("dosen-update-index");
            });

            Route::controller(ServicesDosenService::class)->group(function () {
                // Service CRUD

                Route::get("/delete/{id}", "delete")->name("dosen-delete");
                Route::post("/insert", "insert")->name("dosen-insert");
                Route::post("/update", "update")->name("dosen-update");
            });
        });

        // Gedung Class
        Route::prefix("gedung")->group(function () {
            Route::controller(GedungController::class)->group(function () {
                Route::get("/", "index")->name("gedung-index");
                Route::get("/insert", "insert")->name("gedung-create-index");
            });
            Route::controller(GedungService::class)->group(function () {
                Route::post("/insert", "insert")->name("gedung-insert");
                Route::get("/delete/{id}", "delete")->name("gedung-delete");
            });
        });

        // Ruanga Class
        Route::prefix("ruangan")->group(function () {
            Route::controller(RuanganController::class)->group(function () {
                Route::get("/", "index")->name("ruangan-index");
                Route::get("/insert", "insert")->name("ruangan-insert-index");
            });

            Route::controller(RuanganService::class)->group(function () {
                Route::post("/insert", "insert")->name("ruangan-insert");
                Route::get("/delete/{id}", "delete")->name("ruangan-delete");
            });
        });

        // Jurusan Class
        Route::prefix("jurusan")->group(function () {
            Route::controller(JurusanController::class)->group(function () {
                Route::get("/", "index")->name("jurusan-index");
                Route::get("/insert", "insert")->name("jurusan-insert-index");
            });
            Route::controller(JurusanService::class)->group(function () {
                Route::post("/insert", "insert")->name("jurusan-insert");
                Route::get("/delete/{id}", "delete")->name("jurusan-delete");
            });
        });

        // Kelas Class
        Route::prefix("kelas")->group(function () {
            Route::controller(KelasController::class)->group(function () {
                Route::get("/", "index")->name("kelas-index");
                Route::get("/insert", "insert")->name("kelas-insert-index");
            });
            Route::controller(KelasService::class)->group(function () {
                Route::get("/delete/{id}", "delete")->name("kelas-delete");
                Route::post("/insert", "insert")->name("kelas-insert");
            });
        });

        // Kurikulum Class
        Route::prefix("kurikulum")->group(function () {
            Route::controller(KurikulumController::class)->group(function () {
                Route::get("/", "index")->name("kurikulum-index");
                Route::get("/insert", "insert")->name("kurikulum-insert-index");
            });
            Route::controller(KurikulumService::class)->group(function () {
                Route::post("/insert", "insert")->name("kurikulum-insert");
                Route::get("/delete/{id}", "delete")->name("kurikulum-delete");
            });
        });
    });

    // Matakuliah Class
    Route::prefix("mata-kuliah")->group(function () {
        // View
        Route::controller(MatakuliahController::class)->group(function () {
            Route::get("/", "index")->name("matkul-index");
        });

        // Services
        Route::controller(MatkulService::class)->prefix("matkul-service")->group(function () {
            Route::post("/insert", "insert")->name("matkul-insert");
        });

        // Semester Class
        Route::prefix("semester")->group(function () {
            Route::controller(SemesterController::class)->group(function () {
                Route::get("/insert", "insertView")->name("semester-insert-index");
            });

            Route::controller(SemesterService::class)->group(function () {
                Route::post("/insert", "insert")->name('semester-insert');
            });
        });

        // Waktu Class
        Route::prefix("waktu")->group(function () {
            Route::controller(WaktuService::class)->group(function () {
                Route::post("/insert", "insert")->name("waktu-insert");
            });
        });

        // Jadwal Kuliah
        Route::prefix("matkul")->controller(JadwalKuliahConstroller::class)->group(function () {
            Route::post("/insert", "insert")->name("jadwal-insert");
        });
    });
});
