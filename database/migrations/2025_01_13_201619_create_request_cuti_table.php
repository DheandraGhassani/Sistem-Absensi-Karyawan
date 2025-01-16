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
        Schema::create('request_cuti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->enum('jenis_cuti', ['Cuti', 'Izin', 'Sakit']);
            $table->enum('status', ['Disetujui', 'Tidak Disetujui'])->default('Tidak Disetujui');
            $table->date('tanggal_pengajuan_mulai');
            $table->date('tanggal_pengajuan_selesai');
            $table->integer('jumlah');
            $table->string('lampiran_file')->nullable(); // Menyimpan nama file lampiran jika ada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('request_cuti');
    }
};
