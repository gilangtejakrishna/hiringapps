<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamaranPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'lamaran_pekerjaans';

    // Mengatur primary key
    protected $primaryKey = 'id_lamaran';

    protected $fillable = [
        'id_pelamar',
        'id_pekerjaan',
        'tgl_lahir',
        'alamat',
        'kode_pos',
        'jenis_kelamin',
        'no_tlp',
        'lulusan',
        'berkas',
        'status',
    ];

    // Relasi ke model Pelamar
    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'id_pelamar', 'id_pelamar');
    }

    // Relasi ke model Pekerjaan
    public function pekerjaan()
    {
        return $this->belongsTo(Pekerjaan::class, 'id_pekerjaan', 'id_pekerjaan');
    }
}
