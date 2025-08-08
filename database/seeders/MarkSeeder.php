<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Exam;
use App\Models\Mark;

class MarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sadece id'leri çekmek daha hafif
        $studentIds = User::query()
            ->where('role_id', 3) // 3 = Student
            ->pluck('id');

        if ($studentIds->isEmpty()) {
            $this->command?->warn('No students (role_id=3) found. Skipping MarkSeeder.');
            return;
        }

        $examIds = Exam::query()->pluck('id');

        if ($examIds->isEmpty()) {
            $this->command?->warn('No exams found. Skipping MarkSeeder.');
            return;
        }

        // Idempotent: aynı (student_id, exam_id) için tekrar yazmaz
        foreach ($studentIds as $studentId) {
            foreach ($examIds as $examId) {
                Mark::firstOrCreate(
                    ['student_id' => $studentId, 'exam_id' => $examId],
                    ['marks_obtained' => random_int(40, 100)]
                );
            }
        }
    }
}
