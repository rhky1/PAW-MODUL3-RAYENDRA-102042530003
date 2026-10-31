<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Akun Pengguna LMS (1 Dosen & 1 Mahasiswa)
        // Hint:
        // - Gunakan email sebagai identitas akun.
        // - Lengkapi nama, password yang di-hash, role Dosen,dan nomor induk.
        User::updateOrCreate(
            ['email' => 'dosen@celoe.test'],
            [
                'name' => 'Dosen CeLOE',
                'password' => Hash::make('dosen123'),
                'role' => 'dosen',
                'nomor_induk' => '1985010101',
            ],
        );

        User::updateOrCreate(
            ['email' => 'mahasiswa@celoe.test'],
            [
                'name' => 'Mahasiswa CeLOE',
                'password' => Hash::make('mahasiswa123'),
                'role' => 'mahasiswa',
                'nomor_induk' => '1301210001',
            ],
        );
    }
}
