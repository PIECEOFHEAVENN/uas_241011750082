<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EkstrakurikulerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'id_kegiatan' => 'EKS001',
                'gambar' => 'uploads/ekstrakurikuler/basket.jpg',
                'nama_kegiatan' => 'Basket',
                'hari' => 'Senin',
                'waktu' => '15:00 - 17:00',
                'pembina' => 'Rico Lubis',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kegiatan' => 'EKS002',
                'gambar' => 'uploads/ekstrakurikuler/futsal.jpg',
                'nama_kegiatan' => 'Futsal',
                'hari' => 'Rabu',
                'waktu' => '15:30 - 17:30',
                'pembina' => 'Bayu Aditya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_kegiatan' => 'EKS003',
                'gambar' => 'uploads/ekstrakurikuler/badminton.jpg',
                'nama_kegiatan' => 'Badminton',
                'hari' => 'Jumat',
                'waktu' => '14:00 - 16:00',
                'pembina' => 'Susi Susanti',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($items as $item) {
            DB::table('ekstrakurikuler')->updateOrInsert(
                ['id_kegiatan' => $item['id_kegiatan']],
                $item
            );
        }
    }
}
