<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Course;
use App\Models\Module;
use App\Models\Lesson;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Admin
        User::create([
            'username' => 'admin', 
            'nim_user' => '1234567890',
            'nm_user' => 'Administrator', // Changed from name
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Create Student
        User::create([
            'username' => 'student', 
            'nim_user' => '0987654321',
            'nm_user' => 'Student Demo', // Changed from name
            'email' => 'student@student.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        $this->call([
            ProdiSeeder::class,
            MahasiswaSeeder::class,
        ]);
        
        // Courses can be seeded if needed, but not critical for this refactor
    }
}
