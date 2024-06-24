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
        Schema::create('baptis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jemaat_id')->constrained('jemaat')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('sertifikat')->nullable();
            $table->date('tanggal_baptis')->nullable();
            $table->string('nomor_baptis')->nullable();
            $table->string('nama_pendeta')->nullable();
            $table->string('status_baptis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baptis');
    }
};
