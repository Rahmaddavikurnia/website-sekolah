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
        Schema::create('humas', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kegiatan');
            $table->string('slug');
            $table->text('deskripsi_kegiatan');
            $table->date('tanggal_kegiatan');
            $table->string('tempat');
            $table->string('pihak_terkait')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('humas');
    }
};
