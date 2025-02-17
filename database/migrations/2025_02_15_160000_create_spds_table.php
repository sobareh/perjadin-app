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
        Schema::create('spds', function (Blueprint $table) {
            $table->id();
            $table->string('no_sppd');
            $table->date('tanggal_sppd');
            $table->double('harian');
            $table->integer('jumlah_hari');
            $table->double('penginapan');
            $table->double('tiket_transport');
            $table->double('dpr');
            $table->integer('status');
            $table->date('tanggal_pencairan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spds');
    }
};
