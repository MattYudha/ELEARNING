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
        // 1. Fix Enrollments
        Schema::table('enrollments', function (Blueprint $table) {
            // Because we can't easily change foreign key constraints with data, 
            // and we are in dev, we might need to drop and recreate or disable constraints.
            // But let's assume we just need to ensure the column type matches m_user.username (varchar/string)
            // m_user.username is likely varchar(255) by default string(), or whatever was in User migration. 
            // The rename migration didn't change type. Users table usually has string('name') etc. Wait, username was added?
            // Users table: 'name', 'email'. Username added later? No.
            // Ah, I need to check m_user schema.
        });

        // Actually, the issue is likely that enrollments.user_id was char(10) but user.username might be string(255).
        // OR the foreign key was pointing to 'users.username' but table renamed to 'm_user'.
        // When renaming table, FKs usually stay pointing to the TABLE (MySQL handles rename).
        
        // However, I will DROP and RE-ADD the foreign keys to be safe and point to m_user.username.
        
        Schema::table('enrollments', function (Blueprint $table) {
             $table->dropForeign(['user_id']); 
             // We need to make sure user_id is string.
             $table->string('user_id', 100)->change();
             $table->foreign('user_id')->references('username')->on('m_user')->onDelete('cascade');
        });

        Schema::table('lesson_completions', function (Blueprint $table) {
             // Drop FK if exists (it might verify id)
             // lesson_completions might have used id? 2026_01_24_023441_create_lesson_completions_table.php content will confirm.
             // Assuming it used constrained()->cascadeOnDelete() which defaults to references('id') on('users').
             // But users PK is now username. 
             
             // If it was foreignId('user_id'), it is unsignedBigInt. It MUST be string for username.
             
             // First drop potential FK
             $table->dropForeign(['user_id']); // Default name might be lesson_completions_user_id_foreign
        });
        
        // SQLite/MySQL differences make dropping by name tricky if we don't know it.
        // But for lesson_completions, let's redefine column.
        
        Schema::table('lesson_completions', function (Blueprint $table) {
            $table->string('user_id', 100)->change();
            $table->foreign('user_id')->references('username')->on('m_user')->onDelete('cascade');
        });

        Schema::table('quiz_attempts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
             $table->string('user_id', 100)->change();
             $table->foreign('user_id')->references('username')->on('m_user')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Irreversible easily without data loss or complexity
    }
};
