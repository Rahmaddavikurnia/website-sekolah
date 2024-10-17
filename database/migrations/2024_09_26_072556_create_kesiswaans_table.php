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
        Schema::create('kesiswaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->string('slug');
            $table->longText('deskripsi_program');
            $table->string('penanggung_jawab')->nullable();
            $table->string('foto_program')->nullable();
            $table->string('foto_anggota')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesiswaans');
    }
};
