<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username'=> fake()->username(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            if ($user->id == 1) {
                $user->detailGtk()->create([
                    'nip' => fake()->randomNumber(),
                    'jk' => 'l',
                    'jabatan' => 'admin',
                ]);
            } elseif($user->id == 2) {
                $user->detailGtk()->create([
                    'nip' => fake()->randomNumber(),
                    'jk' => 'l',
                    'jabatan' => 'kepalasekolah',
                ]);
            } elseif($user->id == 3) {
                $user->detailGtk()->create([
                    'nip' => fake()->randomNumber(),
                    'jk' => 'p',
                    'jabatan' => 'walikelas',
                ]);
            } elseif($user->id == 4) {
                $user->detailGtk()->create([
                    'nip' => fake()->randomNumber(),
                    'jk' => 'p',
                    'jabatan' => 'guru',
                ]);
            } else {
                $user->detailSiswa()->create([
                    'nisn' => fake()->randomNumber(),
                    'nis' => fake()->randomNumber(),
                    'tmp_lahir' => fake()->city(),
                    'tgl_lahir' => fake()->date(),
                    'jk' => 'l',
                    'thn_masuk' => fake()->year(),
                    'agama' => 'islam'
                ]);
            }
        });
    }
}
