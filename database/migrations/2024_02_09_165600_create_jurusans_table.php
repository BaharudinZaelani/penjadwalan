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
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id();
            $table->string("nama_idn");
            $table->string("nama_en");
            $table->string("bidang_keahlian");
            $table->string("kompetensi_umum");
            $table->string("kompetensi_khusus");
            $table->string("pejabat");
            $table->string("jabatan");
            $table->text("keterangan")->nullable();
            $table->boolean("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
