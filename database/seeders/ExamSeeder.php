<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Exam;      // <-- EKLENDİ
use Carbon\Carbon;        // <-- EKLENDİ

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $examTypes  = ['Midterm', 'Final'];
        $subjectIds = [1, 2, 3, 4, 5];

        $startDate = Carbon::parse('2025-06-01');

        // create() kullanacaksan Exam modelinde $fillable olmalı.
        foreach ($subjectIds as $i => $subjectId) {
            foreach ($examTypes as $t => $type) {
                Exam::create([
                    'name'       => $type,
                    'date'       => $startDate->copy()->addDays($i * 5 + $t),
                    'subject_id' => $subjectId,
                ]);
            }
        }
    }
}
