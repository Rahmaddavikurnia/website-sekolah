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
        Schema::create('kabars', function (Blueprint $table) {
            $table->id();
            $table->string('judul_kabar');
            $table->longText('isi_kabar');
            $table->date('tanggal_terbit');
            // $table->morphs('related');
            $table->string('related_type')->nullable();
            $table->string('gambar')->nullable();
            $table->date('tanggal_berlaku')->nullable();
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kabars');
    }
};
