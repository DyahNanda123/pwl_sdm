<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeyOnProgresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progres', function (Blueprint $table) {
            // Hapus foreign key yang lama
            $table->dropForeign('fk_progres_kegiatan_id');
            // Tambahkan foreign key yang baru
            $table->foreign('kegiatan_id')->references('kegiatan_id')->on('t_kegiatan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progres', function (Blueprint $table) {
            // Hapus foreign key yang baru
            $table->dropForeign('fk_progres_kegiatan_id');
            // Tambahkan foreign key yang lama
            $table->foreign('kegiatan_id')->references('kegiatan_id')->on('kegiatan')->onDelete('cascade');
        });
    }
}
