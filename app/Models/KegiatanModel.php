<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Casts\Attribute;
class KegiatanModel extends Model
{
    use HasFactory;
    protected $table = 't_kegiatan'; // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'kegiatan_id'; // Mendefinisikan primary key dari tabel yang digunakan
    protected $fillable = ['kategori_id','kegiatan_nama', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'status', 'jenis_kegiatan'];
    public function kategori():BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id','kategori_id');
    }
    /*public function kegiatan():HasMany
    {
        return $this->hasMany(UserModel::class, 'user_id', 'user_id');
    }
    public function detail():HasMany{
        return $this->hasMany(DetailKegiatan::class, 'kegiatan_id', 'kegiatan_id');
    }*/
}
