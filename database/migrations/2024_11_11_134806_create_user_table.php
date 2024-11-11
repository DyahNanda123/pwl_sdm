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
        Schema::create('user', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('NIP', 20)->unique(); // NIP sebagai identifier unik
            $table->string('nama', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('confirm_password'); // sebaiknya dienkripsi di controller, bukan disimpan dalam bentuk plain
            $table->unsignedBigInteger('role')->index(); // kolom role sebagai pengganti level_id
            $table->timestamps();

            // Mendefinisikan Foreign Key pada kolom role mengacu pada kolom role di tabel terkait, misal `level`
            $table->foreign('role')->references('level_id')->on('level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
