<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jadwal_kuliahs', function (Blueprint $table) {
            $table->foreignId("waktu_id")->constrained("waktus");
            $table->foreignId("matkul_id")->constrained("mata_kuliahs");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_kuliahs', function (Blueprint $table) {
            //
        });
    }
};
