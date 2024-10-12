<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Pelamar extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'pelamars';

    protected $fillable = [
        'password', 
        'nama_lengkap',
        'email',
    ];

    // Relasi ke model LamaranPekerjaan
    public function lamarans()
    {
        return $this->hasMany(LamaranPekerjaan::class, 'id_pelamar', 'id_pelamar');
    }
}
