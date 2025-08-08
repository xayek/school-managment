<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimeTable;   // <-- model importu
use Carbon\Carbon;          // <-- Carbon importu (istersen now() da kullanabilirsin)

class TimeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
        $subjectIds = [1, 2, 3, 4, 5];

        // İstersen kullan; create() timestamps'ı otomatik doldurur
        // $now = Carbon::now();

        foreach ($days as $day) {
            for ($period = 1; $period <= 7; $period++) {
                TimeTable::create([
                    'day'        => $day,
                    'period'     => $period,
                    // Dönem sayısına göre deterministik subject seçimi
                    'subject_id' => $subjectIds[($period - 1) % count($subjectIds)],
                    // 'created_at' => $now,
                    // 'updated_at' => $now,
                ]);
            }
        }
    }
}
