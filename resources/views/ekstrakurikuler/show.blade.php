@extends('layouts.app')

@section('title', 'Detail Kegiatan')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3"><h5 class="mb-0"><i class="bi bi-eye me-2"></i>Detail Kegiatan Ekstrakurikuler</h5></div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4 text-center">@if($ekstrakurikuler->gambar)<img src="{{ asset('storage/'.$ekstrakurikuler->gambar) }}" class="img-fluid rounded" style="max-height:250px;object-fit:contain;">@else<div class="bg-light p-5 rounded"><i class="bi bi-image display-1 text-muted"></i></div>@endif</div>
            <div class="col-md-8"><h3>{{ $ekstrakurikuler->nama_kegiatan }}</h3><hr>
                <div class="row"><div class="col-6"><p><strong>ID Kegiatan:</strong><br>{{ $ekstrakurikuler->id_kegiatan }}</p></div><div class="col-6"><p><strong>Hari:</strong><br>{{ $ekstrakurikuler->hari }}</p></div></div>
                <div class="row"><div class="col-6"><p><strong>Waktu:</strong><br>{{ $ekstrakurikuler->waktu }}</p></div><div class="col-6"><p><strong>Pembina:</strong><br>{{ $ekstrakurikuler->pembina }}</p></div></div>
                <div class="mt-3 d-flex gap-2"><a href="{{ route('ekstrakurikuler.edit', $ekstrakurikuler->id) }}" class="btn btn-warning text-white"><i class="bi bi-pencil me-1"></i>Edit</a><a href="{{ route('ekstrakurikuler.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Kembali</a></div>
            </div>
        </div>
    </div>
</div>
@endsection