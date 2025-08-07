<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Eksik olan import’lar:
use Carbon\Carbon;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Carbon sınıfını import ettik, şimdi çalışır
        $now = Carbon::now();

        Role::insert([
            ['id' => 1, 'name'       => 'Admin',   'created_at' => $now, 'updated_at' => $now],
            ['id' => 2, 'name'       => 'Teacher', 'created_at' => $now, 'updated_at' => $now],
            ['id' => 3, 'name'       => 'Student', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
