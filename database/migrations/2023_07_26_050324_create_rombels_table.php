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
        Schema::create('rombels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')->onDelete('restrict');
            $table->unsignedBigInteger('ta_id');
            $table->foreign('ta_id')->references('id')->on('tahun_ajarans')->onDelete('restrict');
            $table->unsignedBigInteger('walas_id');
            $table->foreign('walas_id')->references('id')->on('users')->onDelete('restrict');
            $table->string('nama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombels');
    }
};
