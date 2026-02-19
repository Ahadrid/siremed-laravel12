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
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id();

             //foreign Key
             $table->foreignId('kunjungan_id')
                    ->constrained('kunjungan')
                    ->cascadeOnDelete();

            $table->foreignId('pasien_id')
                    ->constrained('pasien')
                    ->restrictOnDelete();

            $table->foreignId('dokter_id')
                    ->constrained('users')
                    ->restrictOnDelete();

            $table->text('keluhan')->nullable();
            $table->text('pemeriksaan')->nullable();
            $table->text('catatan')->nullable();

            $table->enum('status', ['draft', 'final'])
                ->default('draft');

            $table->timestamp('locked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
