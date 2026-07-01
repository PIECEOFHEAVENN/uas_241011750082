<?php

namespace Tests\Feature;

use Database\Seeders\EkstrakurikulerSeeder;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Tests\TestCase;

class PublicEkstrakurikulerImagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_seeded_public_ekstrakurikuler_show_their_expected_images(): void
    {
        $this->seed(EkstrakurikulerSeeder::class);

        $expectedImages = [
            'uploads/ekstrakurikuler/basket.jpg',
            'uploads/ekstrakurikuler/futsal.jpg',
            'uploads/ekstrakurikuler/badminton.jpg',
        ];

        $response = $this->get(route('public.ekstrakurikuler'));

        $response->assertOk();

        foreach ($expectedImages as $image) {
            $this->assertTrue(File::isFile(public_path($image)), "Missing image fixture: {$image}");
            $response->assertSee($image);
        }
    }

    public function test_database_seeder_can_run_multiple_times_without_duplicate_default_rows(): void
    {
        $this->seed(DatabaseSeeder::class);

        DB::table('ekstrakurikuler')
            ->where('id_kegiatan', 'EKS001')
            ->update(['gambar' => null]);

        $this->seed(DatabaseSeeder::class);

        $this->assertSame(1, DB::table('users')->where('username', 'admin')->count());
        $this->assertSame(3, DB::table('ekstrakurikuler')->count());
        $this->assertSame(
            'uploads/ekstrakurikuler/basket.jpg',
            DB::table('ekstrakurikuler')->where('id_kegiatan', 'EKS001')->value('gambar')
        );
    }
}
