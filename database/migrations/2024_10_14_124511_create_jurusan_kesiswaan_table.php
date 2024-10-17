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
        Schema::create('jurusan_kesiswaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kesiswaan_id')->constrained('kesiswaans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('jurusan_id')->constrained('jurusans')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusan_kesiswaan');
    }
};
