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
        // 6. t_krs_mhs
        Schema::create('t_krs_mhs', function (Blueprint $table) {
            $table->string('id_krs_mhs', 10)->primary();
            $table->string('kd_matakuliah', 10)->index();
            $table->string('thn_semester', 10)->nullable();
            $table->string('nim_mhs', 20)->index();
            $table->string('kd_prodi', 20)->nullable();
            $table->string('kd_kelas', 30)->nullable();
            $table->timestamps();
        });

        // 7. t_krs_dosen
         Schema::create('t_krs_dosen', function (Blueprint $table) {
            $table->string('id_krs_dosen', 20)->primary();
            $table->string('kd_mtk_dosen', 20)->nullable(); // Maybe same as kd_matakuliah?
            $table->string('kd_dosen', 20)->index();
            $table->string('thn_semester', 10)->nullable();
            $table->string('hari_mengajar', 30)->nullable();
            $table->time('waktu_mengajar')->nullable();
            $table->string('kelas_mengajar', 30)->nullable();
            $table->timestamps();
        });

        // 8. t_nilai_khs
        Schema::create('t_nilai_khs', function (Blueprint $table) {
            $table->id(); // No PK defined in image, adding ID. Or maybe composite? Image shows just columns.
            $table->string('thn_semester', 10)->nullable();
            $table->string('kd_dosen', 20)->index();
            $table->string('nim_mhs', 20)->index();
            $table->string('kd_matakuliah', 20)->index();
            $table->decimal('absensi', 8, 2)->nullable(); // numeric
            $table->decimal('tugas', 8, 2)->nullable();
            $table->decimal('uts', 8, 2)->nullable();
            $table->decimal('uas', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_nilai_khs');
        Schema::dropIfExists('t_krs_dosen');
        Schema::dropIfExists('t_krs_mhs');
    }
};
