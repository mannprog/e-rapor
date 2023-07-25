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
        Schema::create('detail_siswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('nisn', 8);
            $table->string('nis', 18);
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->enum('jk', ['l', 'p']);
            $table->string('no_hp')->nullable();
            $table->string('thn_masuk');
            $table->enum('agama', ['islam', 'katolik', 'protestan', 'hindu', 'buddha', 'khonghucu']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_siswas');
    }
};
