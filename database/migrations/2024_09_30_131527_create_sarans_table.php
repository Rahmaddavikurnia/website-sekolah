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
        Schema::create('sarans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pengguna yang mengirimkan saran
            $table->string('email'); // Email pengguna
            $table->longText('message'); // Isi pesan/saran
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarans');
    }
};
