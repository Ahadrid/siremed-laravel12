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
        Schema::create('kunjungan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kunjungan');
            $table->string('poli', 100);
            $table->enum('status', ['menunggu', 'diperiksa', 'selesai'])
                    ->default('menunggu');
    
            //Foreign Key
            $table->foreignId('pasien_id')->constrained('pasien')->restrictOnDelete();
            $table->foreignId('dokter_id')->constrained('users')->restrictOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunjungan');
    }
};
