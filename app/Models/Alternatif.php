<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'npm',
        'jurusan',
        'no_telp',
        'semester1',
        'semester2',
        'semester3',
        'semester4',
        'semester5',
        'semester6',
        'prestasi',
        'pas_foto',
        'foto_ktp',
        'karya_tulis',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }

    public function hasil()
    {
        return $this->hasMany(Hasil::class);
    }
}
