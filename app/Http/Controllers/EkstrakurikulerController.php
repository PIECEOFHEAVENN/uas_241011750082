<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::latest()->paginate(10);
        return view('ekstrakurikuler.index', compact('ekstrakurikuler'));
    }

    public function create()
    {
        return view('ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id_kegiatan' => 'required|string|max:20|unique:ekstrakurikuler',
            'nama_kegiatan' => 'required|string|max:255',
            'hari' => 'required|string|max:20',
            'waktu' => 'required|string|max:20',
            'pembina' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $this->storeImage($request->file('gambar'));
        } else {
            unset($data['gambar']);
        }

        Ekstrakurikuler::create($data);

        return redirect()->route('ekstrakurikuler.index')
            ->with('success', 'Kegiatan ekstrakurikuler berhasil ditambahkan!');
    }

    public function show(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('ekstrakurikuler.show', compact('ekstrakurikuler'));
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $data = $request->validate([
            'id_kegiatan' => 'required|string|max:20|unique:ekstrakurikuler,id_kegiatan,' . $ekstrakurikuler->id,
            'nama_kegiatan' => 'required|string|max:255',
            'hari' => 'required|string|max:20',
            'waktu' => 'required|string|max:20',
            'pembina' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $this->deleteImage($ekstrakurikuler->gambar);
            $data['gambar'] = $this->storeImage($request->file('gambar'));
        } else {
            unset($data['gambar']);
        }

        $ekstrakurikuler->update($data);

        return redirect()->route('ekstrakurikuler.index')
            ->with('success', 'Kegiatan ekstrakurikuler berhasil diupdate!');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        $this->deleteImage($ekstrakurikuler->gambar);

        $ekstrakurikuler->delete();

        return redirect()->route('ekstrakurikuler.index')
            ->with('success', 'Kegiatan ekstrakurikuler berhasil dihapus!');
    }

    public function image(string $filename)
    {
        $filename = basename($filename);

        foreach ($this->imageLookupPaths($filename) as $path) {
            if (File::isFile($path)) {
                return response()->file($path);
            }
        }

        abort(404);
    }

    private function storeImage(UploadedFile $file): string
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = time().'_'.Str::random(8).'_'.Str::slug($name).'.'.$extension;

        File::ensureDirectoryExists($this->uploadDirectory(), 0755, true);
        $file->move($this->uploadDirectory(), $filename);

        return 'uploads/ekstrakurikuler/'.$filename;
    }

    private function deleteImage(?string $path): void
    {
        if (! $path) {
            return;
        }

        $filename = basename($path);

        foreach ($this->imageLookupPaths($filename) as $imagePath) {
            if (File::isFile($imagePath)) {
                File::delete($imagePath);
            }
        }
    }

    private function imageLookupPaths(string $filename): array
    {
        return [
            $this->tmpUploadDirectory().'/'.$filename,
            public_path('uploads/ekstrakurikuler/'.$filename),
        ];
    }

    private function uploadDirectory(): string
    {
        if (getenv('VERCEL')) {
            return $this->tmpUploadDirectory();
        }

        return public_path('uploads/ekstrakurikuler');
    }

    private function tmpUploadDirectory(): string
    {
        return '/tmp/uploads/ekstrakurikuler';
    }
}
