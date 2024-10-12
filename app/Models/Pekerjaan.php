<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika berbeda dari konvensi Laravel
    protected $table = 'pekerjaans';

    // Menentukan primary key
    protected $primaryKey = 'id_pekerjaan';

    // Field yang bisa diisi melalui mass assignment
    protected $fillable = [
        'nama',
        'status',
    ];

    // Relasi ke model Pelamar
    public function pelamars()
    {
        return $this->hasMany(Pelamar::class, 'id_pekerjaan', 'id_pekerjaan');
    }
}