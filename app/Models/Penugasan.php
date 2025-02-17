<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PenugasanPegawai;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;



class Penugasan extends Model
{
    public function pegawai() 
    {
        return $this->belongsToMany(Pegawai::class, 'penugasan_pegawai')->withPivot(['id'])->withTimestamps();
    }

    public function spd() {
        return $this->belongsToMany(Spd::class, 'penugasan_pegawai')->withTimeStamps();
    }

    public function penugasanPegawai(): HasMany
    {
        return $this->hasMany(PenugasanPegawai::class);
    }

    public function scopeDaftar(Builder $query)
    {
        $datum = $query->with('pegawai')->get();
        $result = array();

        foreach ($datum as $item) {
            foreach($item->pegawai as $pegawai) {
                $result[] = [
                    "name" => $item->nama_st . " | " . $pegawai->nama,
                    "id" => $pegawai->pivot->id
                ];
            }
        }

        $resultData = collect($result);

        return $resultData;
    }
}
