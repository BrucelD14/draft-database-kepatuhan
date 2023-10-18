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
        Schema::create('catatan_revius', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reviu_peraturan_eksternal_id');
            $table->foreignId('user_id');
            $table->text('pesan_catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_revius');
    }
};
