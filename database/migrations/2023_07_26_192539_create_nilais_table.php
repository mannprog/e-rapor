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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mapel_id');
            $table->foreign('mapel_id')->references('id')->on('mapels')->onDelete('restrict');
            $table->unsignedBigInteger('rs_id');
            $table->foreign('rs_id')->references('id')->on('rombel_siswas')->onDelete('restrict');
            $table->string('nharian');
            $table->string('nuts');
            $table->string('nuas');
            $table->text('ck');
            $table->string('alpa')->default('-');
            $table->string('izin')->default('-');
            $table->string('sakit')->default('-');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
