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
        Schema::create('internal_regulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jenis_peraturan_internal_id');
            $table->foreignId('kategori_divisi_id')->nullable();
            $table->string('nomor_peraturan')->unique();
            $table->date('tanggal_penetapan')->nullable();
            $table->text('tentang');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->enum('visibility', ['public', 'confidential'])->default('public')->nullable();
            $table->text('keterangan_status')->nullable();
            $table->string('dokumen')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_regulations');
    }
};
