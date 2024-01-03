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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('judul_artikel');
            $table->string('penulis');
            $table->string('nama_jurnal');
            $table->string('volume_jurnal');
            $table->string('nomor_jurnal')->nullable();
            $table->string('halaman');
            $table->string('ISSN');
            $table->string('penerbit');
            $table->string('file_path')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
