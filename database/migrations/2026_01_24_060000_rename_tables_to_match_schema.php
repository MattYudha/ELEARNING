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
        // 1. Rename users -> m_user
        if (Schema::hasTable('users')) {
            Schema::rename('users', 'm_user');
        }
        
        Schema::table('m_user', function (Blueprint $table) {
            // Adjust columns to match schema: username, nm_user, password
            // Existing: username, nim_user, name, email, password, role, avatar...
            
            // Rename name -> nm_user
            if (Schema::hasColumn('m_user', 'name')) {
                $table->renameColumn('name', 'nm_user');
            }
            
            // Drop unnecessary columns if strict to schema, or keep them nullable?
            // Schema only shows username, nm_user, password.
            // But we need 'role' for the app logic. I will keep 'role' and 'avatar' but make sure nm_user exists.
        });

        // 2. Rename m_mahasiswa -> m_mhs
        if (Schema::hasTable('m_mahasiswa')) {
            Schema::rename('m_mahasiswa', 'm_mhs');
        }

        // Schema for m_mhs is already mostly correct from previous steps, checking columns?
        // nim_mhs, kd_prodi, nm_mhs, tempat_lhr_mhs, agama, tgl_lhr_mhs, jenis_klmn_mhs, tgl_msk_mhs, kd_status_mhs, alamat_mhs, tlp_mhs
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('m_mhs', 'm_mahasiswa');
        
        Schema::table('m_user', function (Blueprint $table) {
            $table->renameColumn('nm_user', 'name');
        });
        Schema::rename('m_user', 'users');
    }
};
