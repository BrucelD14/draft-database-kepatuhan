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
            $table->string('nomor_peraturan');
            $table->timestamp('tanggal_ditetapkan')->nullable();
            $table->string('slug')->nullable();
            $table->text('tentang');
            $table->boolean('status')->default(true);
            $table->string('dokumen');
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
