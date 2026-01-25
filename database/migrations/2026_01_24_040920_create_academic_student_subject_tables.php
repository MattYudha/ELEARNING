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
        // 4. m_mahasiswa
        Schema::create('m_mahasiswa', function (Blueprint $table) {
            $table->string('nim_mhs', 10)->primary();
            $table->string('kd_prodi', 7)->index(); // FK likely, simplified as column first
            $table->string('nm_mhs', 50)->nullable();
            $table->string('tempat_lhr_mhs', 30)->nullable();
            $table->string('agama', 30)->nullable();
            $table->date('tgl_lhr_mhs')->nullable();
            $table->string('jenis_klmn_mhs', 2)->nullable();
            $table->date('tgl_msk_mhs')->nullable();
            $table->string('kd_status_mhs', 2)->nullable();
            $table->string('alamat_mhs', 500)->nullable();
            $table->string('tlp_mhs', 15)->nullable();
            $table->timestamps();
        });

        // 5. m_mata_kuliah
        Schema::create('m_mata_kuliah', function (Blueprint $table) {
            $table->string('kd_matakuliah', 10)->primary();
            $table->string('kd_prodi', 20)->index();
            $table->string('nm_matakuliah', 132)->nullable();
            $table->string('jml_sks_matakuliah', 2)->nullable();
            $table->string('semester_matakuliah', 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_mata_kuliah');
        Schema::dropIfExists('m_mahasiswa');
    }
};
