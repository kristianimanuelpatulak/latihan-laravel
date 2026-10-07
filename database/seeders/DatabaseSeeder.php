<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::factory(10)->create();

        // Student::factory()->create([
        //     'name' => 'Test Student',
        //     'nim' => '123456789012',
        // ]);
    }
}
