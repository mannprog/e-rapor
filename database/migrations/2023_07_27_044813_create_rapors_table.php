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
        Schema::create('rapors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rapor_id');
            $table->foreign('rapor_id')->references('id')->on('rapor_siswas')->onDelete('cascade');
            $table->unsignedBigInteger('nilai_id');
            $table->foreign('nilai_id')->references('id')->on('nilais')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapors');
    }
};
