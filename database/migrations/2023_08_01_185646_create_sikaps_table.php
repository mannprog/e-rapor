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
        Schema::create('sikaps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rapor_siswa_id');
            $table->foreign('rapor_siswa_id')->references('id')->on('rapor_siswas')->onDelete('restrict');
            $table->string('dimensi')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sikaps');
    }
};
