<?php

namespace Tests\Feature;

use App\Models\Ekstrakurikuler;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EkstrakurikulerImageUploadTest extends TestCase
{
    use RefreshDatabase;

    private array $createdImages = [];

    protected function tearDown(): void
    {
        foreach ($this->createdImages as $image) {
            File::delete(public_path($image));
        }

        parent::tearDown();
    }

    public function test_admin_can_create_ekstrakurikuler_with_uploaded_image(): void
    {
        $user = User::forceCreate([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('password123'),
        ]);

        $response = $this
            ->actingAs($user)
            ->post(route('ekstrakurikuler.store'), [
                'id_kegiatan' => 'EKS999',
                'nama_kegiatan' => 'Renang',
                'hari' => 'Selasa',
                'waktu' => '15:00 - 17:00',
                'pembina' => 'Budi',
                'gambar' => UploadedFile::fake()->image('renang.jpg', 320, 240),
            ]);

        $response->assertRedirect(route('ekstrakurikuler.index'));

        $ekstrakurikuler = Ekstrakurikuler::where('id_kegiatan', 'EKS999')->firstOrFail();
        $this->createdImages[] = $ekstrakurikuler->gambar;

        $this->assertStringStartsWith('uploads/ekstrakurikuler/', $ekstrakurikuler->gambar);
        $this->assertFileExists(public_path($ekstrakurikuler->gambar));
    }
}
