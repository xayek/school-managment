<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Eksik importlar:
use App\Models\Subject;
use Carbon\Carbon;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        Subject::insert([
            ['id' => 1, 'name'       => 'Mathematics', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'name'       => 'Science',     'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'name'       => 'History',     'created_at' => $now, 'updated_at' => $now],
            ['id' => 4, 'name'       => 'Geography',   'created_at' => $now, 'updated_at' => $now],
            ['id' => 5, 'name'       => 'English',     'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
