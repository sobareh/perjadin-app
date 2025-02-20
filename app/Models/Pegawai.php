<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PenugasanPegawai;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    public function penugasans() 
    {
        return $this->belongsToMany(Penugasan::class, 'penugasan_pegawai')
        ->withPivot([
            'id', 'no_sppd', 'tanggal_sppd', 'harian', 'penginapan','dpr', 'status'
        ])
        ->withTimestamps();
    }

    public function penugasanPegawai(): HasMany
    {
        return $this->hasMany(PenugasanPegawai::class);
    }
}
