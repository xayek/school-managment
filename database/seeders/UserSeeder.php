<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// Aşağıdakileri ekleyin:
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Carbon sınıfını import ettik, şimdi çalışır
        $now = Carbon::now();

        User::insert([
            [
                'id'         => 1,
                'name'       => 'Admin User',
                'email'      => 'admin@mail.com',
                'password'   => Hash::make('12345678'),
                'role_id'    => 1, // admin
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id'         => 2,
                'name'       => 'Teacher User',
                'email'      => 'teacher@mail.com',
                'password'   => Hash::make('12345678'),
                'role_id'    => 2, // teacher
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id'         => 3,
                'name'       => 'Student User',
                'email'      => 'student@mail.com',
                'password'   => Hash::make('12345678'),
                'role_id'    => 3, // student
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id'         => 4,
                'name'       => 'Student Mom',
                'email'      => 'moekaun@mail.com',
                'password'   => Hash::make('12345678'),
                'role_id'    => 3, // student mom
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id'         => 5,
                'name'       => 'Student Dad',
                'email'      => 'studentdad@mail.com',
                'password'   => Hash::make('12345678'),
                'role_id'    => 3, // student dad
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]); // <-- noktalı virgül burada
    }
}
