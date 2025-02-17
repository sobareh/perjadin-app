<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\{Pegawai, Penugasan, Spd};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penugasan_pegawai', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Penugasan::class);
            $table->foreignIdFor(Pegawai::class);
            $table->foreignIdFor(Spd::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasan_pegawai');
    }
};
