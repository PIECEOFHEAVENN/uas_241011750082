@extends('layouts.app')

@section('title', 'Edit Kegiatan')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3"><h5 class="mb-0"><i class="bi bi-pencil me-2"></i>Edit Kegiatan Ekstrakurikuler</h5></div>
    <div class="card-body">
        <form action="{{ route('ekstrakurikuler.update', $ekstrakurikuler->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6"><div class="mb-3"><label class="form-label">ID Kegiatan <span class="text-danger">*</span></label><input type="text" class="form-control" name="id_kegiatan" value="{{ old('id_kegiatan', $ekstrakurikuler->id_kegiatan) }}" required></div></div>
                <div class="col-md-6"><div class="mb-3"><label class="form-label">Nama Kegiatan <span class="text-danger">*</span></label><input type="text" class="form-control" name="nama_kegiatan" value="{{ old('nama_kegiatan', $ekstrakurikuler->nama_kegiatan) }}" required></div></div>
                <div class="col-md-4"><div class="mb-3"><label class="form-label">Hari <span class="text-danger">*</span></label><input type="text" class="form-control" name="hari" value="{{ old('hari', $ekstrakurikuler->hari) }}" required></div></div>
                <div class="col-md-4"><div class="mb-3"><label class="form-label">Waktu <span class="text-danger">*</span></label><input type="text" class="form-control" name="waktu" value="{{ old('waktu', $ekstrakurikuler->waktu) }}" required></div></div>
                <div class="col-md-4"><div class="mb-3"><label class="form-label">Pembina <span class="text-danger">*</span></label><input type="text" class="form-control" name="pembina" value="{{ old('pembina', $ekstrakurikuler->pembina) }}" required></div></div>
                <div class="col-12"><div class="mb-3"><label class="form-label">Gambar</label>@if($ekstrakurikuler->gambar)<div class="mb-2"><img src="{{ asset($ekstrakurikuler->gambar) }}" width="100" style="border-radius:8px;"><br><small class="text-muted">Gambar saat ini</small></div>@endif<input type="file" class="form-control" name="gambar" accept="image/*"><small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB. Kosongkan jika tidak ingin mengubah.</small></div></div>
            </div>
            <div class="d-flex gap-2"><button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Update</button><a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Kembali</a></div>
        </form>
    </div>
</div>
@endsection
