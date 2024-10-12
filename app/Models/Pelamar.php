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

    // Tentukan primary key yang digunakan
    protected $primaryKey = 'id_pelamar';

    // Jika primary key bukan 'id', tambahkan ini
    public $incrementing = true; // Atur menjadi false jika menggunakan UUID atau format lain

    protected $fillable = [
        'password',
        'nama_lengkap',
        'email',
    ];

    // Jika kolom `password` akan disimpan dalam bentuk hash, tambahkan properti berikut
    protected $hidden = [
        'password',
    ];

    // Relasi ke model LamaranPekerjaan
    public function lamarans()
    {
        return $this->hasMany(LamaranPekerjaan::class, 'id_pelamar', 'id_pelamar');
    }
}
