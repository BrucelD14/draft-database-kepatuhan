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
        Schema::create('peraturan_internals', function (Blueprint $table) {
            $table->id();
            $table->string('no_peraturan');
            $table->string('deskripsi');
            $table->date('tanggal_penetapan');
            $table->enum('status', ['Berlaku', 'Tidak Berlaku']);
            $table->binary('file_peraturan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peraturan_internals');
    }
};
