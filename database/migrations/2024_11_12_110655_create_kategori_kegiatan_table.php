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
        Schema::create('kategori_kegiatan', function (Blueprint $table) {
            $table->id(); // Secara otomatis membuat kolom id
            $table->string('nama_kategori', 100); // Kolom nama_kategori
            $table->text('deskripsi')->nullable(); // Kolom deskripsi, nullable jika tidak selalu diperlukan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_kegiatan');
    }
};
