<?php

namespace App\Models;

use App\Enums\PenugasanStatus;
use Illuminate\Database\Eloquent\Model;
use App\Models\PenugasanPegawai;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;



class Penugasan extends Model
{
    protected $casts = [
        'tujuan' => PenugasanStatus::class,
    ];

    public function pegawai()
    {
        return $this->belongsToMany(Pegawai::class, 'penugasan_pegawai')->withPivot([
            'id', 'no_sppd', 'tanggal_sppd', 'harian', 'penginapan','dpr', 'status'
            ])->withTimestamps();
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
