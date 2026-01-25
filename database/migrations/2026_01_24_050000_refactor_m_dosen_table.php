<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('m_dosen');

        Schema::create('m_dosen', function (Blueprint $table) {
            $table->string('kd_dosen', 20)->primary();
            $table->string('nm_dosen', 132)->nullable();
            $table->string('nidn_dosen', 20)->nullable();
            $table->string('jns_klmn_dosen', 2)->nullable();
            $table->string('kd_jabatan_dosen', 2)->nullable();
            $table->string('status_dosen', 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_dosen');
        // Re-create old schema if needed, but for dev we usually just drop
    }
};
