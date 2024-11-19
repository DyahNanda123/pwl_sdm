<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DaftarKegiatan extends Model
{
    use HasFactory;

    protected $table = 'daftar_kegiatan'; // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'id'; // Mendefinisikan primary key dari tabel yang digunakan

    protected $fillable = ['nama_kegiatan', 'deskripsi', 'tanggal', 'kategori_id', 'status']; // Kolom yang bisa diisi secara massal

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriKegiatan::class, 'id', 'id');
    }
}
