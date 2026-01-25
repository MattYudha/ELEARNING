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
        // Update m_mahasiswa PK
        Schema::table('m_mahasiswa', function (Blueprint $table) {
            $table->string('nim_mhs', 100)->change();
        });

        // Update referencing tables
        Schema::table('t_krs_mhs', function (Blueprint $table) {
            $table->string('nim_mhs', 100)->change();
        });

        Schema::table('t_nilai_khs', function (Blueprint $table) {
            $table->string('nim_mhs', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_mahasiswa', function (Blueprint $table) {
            $table->string('nim_mhs', 10)->change();
        });

        Schema::table('t_krs_mhs', function (Blueprint $table) {
            $table->string('nim_mhs', 20)->change();
        });

        Schema::table('t_nilai_khs', function (Blueprint $table) {
            $table->string('nim_mhs', 20)->change();
        });
    }
};
