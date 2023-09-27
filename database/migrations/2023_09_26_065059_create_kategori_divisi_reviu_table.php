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
            $table->foreignId('kategori_divisi_id')->constrained();
            $table->foreignId('review_eksternal_reg_id')->constrained();
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
