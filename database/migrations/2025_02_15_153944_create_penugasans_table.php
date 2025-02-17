<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penugasans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_st');
            $table->date('tanggal_st');
            $table->string('dasar_st');
            $table->string('perihal_dasar');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('agenda');
            $table->string('jenis_st');
            $table->string('tujuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penugasans');
    }
};
