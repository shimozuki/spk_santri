<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'nisn',
        'nilai_akhir',
        'keterangan_lulus',
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
