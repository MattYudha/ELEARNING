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
        // 1. m_prodi
        Schema::create('m_prodi', function (Blueprint $table) {
            $table->string('kd_prodi', 20)->primary();
            $table->string('kd_jenis_prodi', 5)->nullable();
            $table->string('nm_prodi', 100)->nullable();
            $table->string('status_prodi', 2)->nullable();
            $table->string('email_prodi', 100)->nullable();
            $table->timestamps();
        });

        // 2. m_semester
        Schema::create('m_semester', function (Blueprint $table) {
            $table->string('kd_semester', 7)->primary();
            $table->string('ket_semester', 20)->nullable();
            $table->string('thn_semester', 20)->nullable(); // Size blocked in image, using 20
            $table->timestamps();
        });

        // 3. m_dosen
        Schema::create('m_dosen', function (Blueprint $table) {
            $table->string('no_urut_dosen', 20)->primary();
            $table->string('nm_dosen', 132)->nullable();
            $table->string('nidn_dosen', 20)->nullable();
            $table->string('jns_klmn_dosen', 2)->nullable();
            $table->string('kd_jabatan_dosen', 2)->nullable();
            $table->string('status_dosen', 12)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_dosen');
        Schema::dropIfExists('m_semester');
        Schema::dropIfExists('m_prodi');
    }
};
