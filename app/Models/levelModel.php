<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LevelModel extends Model
{
    use HasFactory;

    protected $table = 'level'; // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'level_id'; // Mendefinisikan primary key dari tabel yang digunakan

    // public function user():HasMany
    // {
    //     return $this->hasMany(UserModel::class, 'user_id', 'user_id');
    // }
    public function users(): HasMany { return $this->hasMany(UserModel::class, 'role', 'level_id'); }
    protected $fillable = ['level_kode', 'level_nama'];
}