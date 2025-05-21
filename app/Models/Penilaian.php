<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alternatif_id',
        'kriteria_id',
        'subkriteria_id',
        'nilai'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function subkriteria()
    {
        return $this->belongsTo(SubKriteria::class);
    }



    // public function subkriteria()
    // {
    //     return $this->belongsTo(SubKriteria::class);
    // }
}
