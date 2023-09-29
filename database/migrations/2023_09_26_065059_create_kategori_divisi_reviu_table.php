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
        Schema::create('kategori_divisi_reviu', function (Blueprint $table) {
            $table->id();
            $table->string('uuid_review_eksternal_reg')->constrained('review_eksternal_regs');
            $table->foreignId('kategori_divisi_id')->constrained('kategori_divisis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_divisi_reviu');
    }
};
