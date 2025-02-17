<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use App\Models\{Spd, Pegawai, Penugasan};
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PenugasanPegawai extends Pivot
{
    protected $table = 'penugasan_pegawai';
    
    public function spd() : BelongsTo {
        return $this->belongsTo(Spd::class);
    }

    public function penugasan() : BelongsTo {
        return $this->belongsTo(Penugasan::class);
    }

    public function pegawai() : BelongsTo {
        return $this->belongsTo(Pegawai::class);
    }
}
