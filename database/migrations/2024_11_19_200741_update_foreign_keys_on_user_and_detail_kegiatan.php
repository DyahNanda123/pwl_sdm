<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToUserOnDetailKegiatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('t_detail_kegiatan', function (Blueprint $table) {
            // Hapus foreign key ke t_user jika masih ada
            $table->dropForeign(['nip']);  // pastikan nama fk benar
            // Tambahkan foreign key baru ke tabel user
            $table->foreign('nip')->references('nip')->on('user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('t_detail_kegiatan', function (Blueprint $table) {
            // Hapus foreign key ke user
            $table->dropForeign(['nip']);
            // Tambahkan foreign key kembali ke t_user
            $table->foreign('nip')->references('nip')->on('t_user')->onDelete('cascade');
        });
    }
}
