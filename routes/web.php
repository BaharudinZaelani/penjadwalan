<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\DosenService;
use App\Http\Controllers\MatakuliahController;
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

        // Matakuliah Class
        Route::prefix("mata-kuliah")->group(function () {
            Route::controller(MatakuliahController::class)->group(function () {
                Route::get("/", "index")->name("matkul-index");
            });
        });
    });
});
