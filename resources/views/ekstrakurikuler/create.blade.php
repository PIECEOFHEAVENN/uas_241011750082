@extends('layouts.app')

@section('title', 'Tambah Kegiatan')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3"><h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Tambah Kegiatan Ekstrakurikuler</h5></div>
    <div class="card-body">
        <form action="{{ route('ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6"><div class="mb-3"><label class="form-label">ID Kegiatan <span class="text-danger">*</span></label><input type="text" class="form-control" name="id_kegiatan" value="{{ old('id_kegiatan') }}" required></div></div>
                <div class="col-md-6"><div class="mb-3"><label class="form-label">Nama Kegiatan <span class="text-danger">*</span></label><input type="text" class="form-control" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}" required></div></div>
                <div class="col-md-4"><div class="mb-3"><label class="form-label">Hari <span class="text-danger">*</span></label><input type="text" class="form-control" name="hari" value="{{ old('hari') }}" required></div></div>
                <div class="col-md-4"><div class="mb-3"><label class="form-label">Waktu <span class="text-danger">*</span></label><input type="text" class="form-control" name="waktu" value="{{ old('waktu') }}" required placeholder="08:00 - 10:00"></div></div>
                <div class="col-md-4"><div class="mb-3"><label class="form-label">Pembina <span class="text-danger">*</span></label><input type="text" class="form-control" name="pembina" value="{{ old('pembina') }}" required></div></div>
                <div class="col-12"><div class="mb-3"><label class="form-label">Gambar</label><input type="file" class="form-control" name="gambar" accept="image/*"><small class="text-muted">Format: jpeg, png, jpg, gif | Maks: 2MB</small></div></div>
            </div>
            <div class="d-flex gap-2"><button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i>Simpan</button><a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Kembali</a></div>
        </form>
    </div>
</div>
@endsection