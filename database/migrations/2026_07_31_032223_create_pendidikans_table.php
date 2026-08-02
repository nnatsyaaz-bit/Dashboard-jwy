<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('nama_instansi'); // Contoh: SD Negeri 07 Kota Jambi
            $table->string('tingkat');       // Contoh: SD, SMP, SMA, Perguruan Tinggi / Jurusan
            $table->string('tahun');         // Contoh: 2022 - 2025
            $table->text('deskripsi')->nullable();
            $table->text('fokus_pembelajaran')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendidikans');
    }
};
