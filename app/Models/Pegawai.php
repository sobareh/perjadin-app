<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PenugasanPegawai;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    public function penugasan() 
    {
        return $this->belongsToMany(Penugasan::class, 'penugasan_pegawai')->withTimestamps();
    }

    public function penugasanPegawai(): HasMany
    {
        return $this->hasMany(PenugasanPegawai::class);
    }
}
