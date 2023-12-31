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
        Schema::create('external_regulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_peraturan_eksternal_id');
            $table->string('nomor_peraturan')->unique();
            $table->date('tanggal_penetapan')->nullable();
            $table->text('tentang');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('keterangan_status')->nullable();
            $table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('external_regulations');
    }
};
