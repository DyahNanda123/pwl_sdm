<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserModel extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table = 'user'; // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id'; // Mendefinisikan primary key dari tabel yang digunakan

    // Menyesuaikan kolom yang dapat diisi sesuai dengan kolom pada tabel
    protected $fillable = ['NIP', 'nama', 'email', 'password', 'role', 'created_at', 'updated_at'];

    protected $hidden = ['password'];
    protected $casts = ['password' => 'hashed'];

    // Relasi dengan model Level menggunakan kolom role
    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'role', 'level_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return[];
    }
}
