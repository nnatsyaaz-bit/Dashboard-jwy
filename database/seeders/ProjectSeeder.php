<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project; // Memanggil Model Project

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'foto'      => 'project1.jpg',
            'kategori'  => 'Web Development',
            'deskripsi' => 'Pengembangan Website Portofolio Interaktif menggunakan Laravel dan AdminLTE.'
        ]);

        Project::create([
            'foto'      => 'project2.jpg',
            'kategori'  => 'Mobile App Design',
            'deskripsi' => 'Desain Antarmuka (UI/UX) Aplikasi Layanan Konsultasi Kecantikan Luenara Beauty.'
        ]);

        Project::create([
            'foto'      => 'project3.jpg',
            'kategori'  => 'System Analysis',
            'deskripsi' => 'Perancangan Struktur Database dan Alur Logika Sistem Informasi Management.'
        ]);
    }
}
