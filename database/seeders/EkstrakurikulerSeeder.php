<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ekstrakurikuler')->insert([
            [
                'id_kegiatan' => 'EKS001',
                'gambar' => null,
                'nama_kegiatan' => 'Basket',
                'hari' => 'Senin',
                'waktu' => '15:00 - 17:00',
                'pembina' => 'Rico Lubis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kegiatan' => 'EKS002',
                'gambar' => null,
                'nama_kegiatan' => 'Futsal',
                'hari' => 'Rabu',
                'waktu' => '15:30 - 17:30',
                'pembina' => 'Bayu Aditya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kegiatan' => 'EKS003',
                'gambar' => null,
                'nama_kegiatan' => 'Badminton',
                'hari' => 'Jumat',
                'waktu' => '14:00 - 16:00',
                'pembina' => 'Susi Susanti',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
}
}
