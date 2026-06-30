<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'id_kegiatan' => 'required|string|max:20|unique:ekstrakurikuler',
            'nama_kegiatan' => 'required|string|max:255',
            'hari' => 'required|string|max:20',
            'waktu' => 'required|string|max:20',
            'pembina' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            $request->file('gambar')->move(public_path('uploads/ekstrakurikuler'), $namaFile);
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
        $request->validate([
            'id_kegiatan' => 'required|string|max:20|unique:ekstrakurikuler,id_kegiatan,' . $ekstrakurikuler->id,
            'nama_kegiatan' => 'required|string|max:255',
            'hari' => 'required|string|max:20',
            'waktu' => 'required|string|max:20',
            'pembina' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $gambarPath = $request->file('gambar')->store('ekstrakurikuler', 'public');
            $data['gambar'] = $gambarPath;
        }

        $ekstrakurikuler->update($data);

        return redirect()->route('ekstrakurikuler.index')
            ->with('success', 'Kegiatan ekstrakurikuler berhasil diupdate!');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->gambar) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }
        $ekstrakurikuler->delete();

        return redirect()->route('ekstrakurikuler.index')
            ->with('success', 'Kegiatan ekstrakurikuler berhasil dihapus!');
    }
}