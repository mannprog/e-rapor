<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0,
        ]);
        User::factory()->create([
            'name' => 'Kepala Sekolah',
            'username' => 'kepalasekolah',
            'email' => 'kepalasekolah@kepalasekolah.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0,
        ]);
        User::factory()->create([
            'name' => 'Walikelas',
            'username' => 'walikelas',
            'email' => 'walikelas@walikelas.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0,
        ]);
        User::factory()->create([
            'name' => 'Guru',
            'username' => 'guru',
            'email' => 'guru@guru.com',
            'password' => bcrypt('1234'),
            'is_admin' => 0,
        ]);

        User::factory()->create([
            'name' => 'Siswa',
            'username' => 'siswa',
            'email' => 'siswa@siswa.com',
            'password' => bcrypt('1234'),
            'is_admin' => 1,
        ]);
    }
}
