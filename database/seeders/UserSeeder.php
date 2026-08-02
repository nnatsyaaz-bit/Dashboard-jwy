<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Buat akun admin default untuk login ke dashboard.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@portofolio.test'],
            [
                'nama'     => 'Administrator',
                'password' => Hash::make('password'),
            ]
        );
    }
}
