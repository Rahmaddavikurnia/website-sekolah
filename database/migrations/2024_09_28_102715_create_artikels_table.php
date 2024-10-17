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
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();
            $table->string('judul_artikel');
            $table->string('slug');
            $table->text('isi_artikel');
            $table->foreignId('penulis_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->date('tanggal_terbit');
            $table->string('kategori_type');
            $table->string('thumbnail')->nullable(); // Kolom untuk menyimpan gambar thumbnail
            $table->integer('views')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikels');
    }
};
