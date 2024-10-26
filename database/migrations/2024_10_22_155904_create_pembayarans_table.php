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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigInteger('santri_nis')->primary();
            $table->enum('jenis_pembayaran', ['SPP', 'Insidentil']);
            $table->string('bulan')->nullable();
            $table->string('tahun')->nullable();
            $table->decimal('jumlah', 10, 2);
            $table->enum('status_pembayaran', ['Belum Lunas', 'Sudah Dibayar'])->default('Belum Lunas');
            $table->timestamps();

            $table->foreign('santri_nis')->references('nis')->on('santris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
