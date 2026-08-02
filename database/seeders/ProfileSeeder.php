<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profile::updateOrCreate(
            ['id' => 1],
            [
                'nama'          => 'Nama Kamu Lengkap',
                'email'         => 'emailkamu@gmail.com',
                'nim'           => '250658302009',
                'prodi'         => 'Teknologi Rekayasa Perangkat Lunak',
                'jenis_kelamin' => 'Perempuan',
                'tgl_lahir'     => '2004-05-20',
                'telp'          => '081234567890',
                'hobi'          => 'Web Development, Coding',
                'alamat'        => 'Alamat lengkap tempat tinggal kamu',
                'foto'          => 'foto_default.jpg',
            ]
        );
    }
}
