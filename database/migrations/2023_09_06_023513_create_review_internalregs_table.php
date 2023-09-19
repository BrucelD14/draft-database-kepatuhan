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
        Schema::create('review_internalregs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('kppp'); //ketentuan peraturan perundang-undangan
            $table->string('kpde'); //ketentuan peraturan direksi eksisting
            $table->text('tentang_peraturan');
            $table->text('keterangan_status');
            $table->boolean('status_publish')->default(false);
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
        Schema::dropIfExists('review_internalregs');
    }
};
