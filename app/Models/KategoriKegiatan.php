<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriKegiatan extends Model
{
    use HasFactory;

    protected $table = 'kategori_kegiatan'; // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'id'; // Mendefinisikan primary key dari tabel yang digunakan

    protected $fillable = ['nama_kategori', 'deskripsi']; // Kolom yang bisa diisi secara massal

    public function kegiatan(): HasMany
    {
        return $this->hasMany(DaftarKegiatan::class, 'kategori_id', 'id');
    }
}
