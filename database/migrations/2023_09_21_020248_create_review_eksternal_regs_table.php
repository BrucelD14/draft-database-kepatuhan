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
        Schema::create('review_eksternal_regs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->timestamp('tanggal_penetapan');
            $table->string('jenis_peraturan');
            $table->string('nomor_peraturan');
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->text('tentang');
            $table->text('ringkasan');
            $table->string('divisi'); // divisi/unit terkait
            $table->date('edisi')->nullable(); // berisi bulan dan tahun
            $table->boolean('status_publish')->default(false)->nullable();
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
        Schema::dropIfExists('review_eksternal_regs');
    }
};
