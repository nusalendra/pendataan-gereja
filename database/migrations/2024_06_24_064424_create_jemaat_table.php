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
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table
                ->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('NIK');
            $table->string('alamat');
            $table->date('tanggal_lahir');
            $table->string('golongan_darah');
            $table->string('surat_akte_lahir');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('status_jemaat');
            $table->string('status_vaksin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jemaat');
    }
};
