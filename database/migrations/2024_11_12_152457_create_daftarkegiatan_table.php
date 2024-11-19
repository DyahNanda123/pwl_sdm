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
        Schema::create('daftar_kegiatan', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('id_kategori') // Foreign key ke tabel kategori_kegiatan
                  ->constrained('kategori_kegiatan')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('nama_kegiatan', 100); // Nama kegiatan
            $table->date('tanggal_pelaksanaan'); // Tanggal pelaksanaan kegiatan
            $table->text('deskripsi')->nullable(); // Deskripsi kegiatan, nullable jika tidak selalu diperlukan
            $table->string('PIC', 100); // PIC (Person in Charge)
            $table->enum('status', ['complete', 'progres'])->default('progres'); // Status kegiatan dengan enum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daftar_kegiatan');
    }
};
