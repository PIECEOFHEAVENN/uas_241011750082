@extends('layouts.app')

@section('title', 'Data Kegiatan Ekstrakurikuler')

@section('content')
<div class="card border-0 shadow-sm">
    <div class="card-header bg-white border-0 py-3 d-flex justify-content-between align-items-center">
        <h5 class="mb-0"><i class="bi bi-calendar-event me-2"></i>Daftar Kegiatan Ekstrakurikuler</h5>
        <a href="{{ route('ekstrakurikuler.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Tambah</a>
    </div>
    <div class="card-body">
        @if($ekstrakurikuler->count() > 0)
        <div class="table-responsive">
            <table class="table table-hover">
                <thead><tr><th>ID</th><th>Gambar</th><th>Nama Kegiatan</th><th>Hari</th><th>Waktu</th><th>Pembina</th><th>Aksi</th></tr></thead>
                <tbody>@foreach($ekstrakurikuler as $item)<tr><td>{{ $item->id_kegiatan }}</td>
                    <td>@if($item->gambar)<img src="{{ asset('storage/'.$item->gambar) }}" width="50" height="50" style="object-fit:cover;border-radius:8px;">@else<i class="bi bi-image text-muted fs-2"></i>@endif</td>
                    <td><strong>{{ $item->nama_kegiatan }}</strong></td>
                    <td>{{ $item->hari }}</td><td>{{ $item->waktu }}</td><td>{{ $item->pembina }}</td>
                    <td><div class="btn-group btn-group-sm"><a href="{{ route('ekstrakurikuler.show', $item->id) }}" class="btn btn-info text-white"><i class="bi bi-eye"></i></a><a href="{{ route('ekstrakurikuler.edit', $item->id) }}" class="btn btn-warning text-white"><i class="bi bi-pencil"></i></a><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $item->id }}"><i class="bi bi-trash"></i></button></div></td></tr>@endforeach</tbody>
            </table>
            {{ $ekstrakurikuler->links() }}
        </div>
        @else
        <div class="text-center py-5"><i class="bi bi-calendar-event fs-1 text-muted"></i><h5 class="mt-3">Belum ada data kegiatan</h5><a href="{{ route('ekstrakurikuler.create') }}" class="btn btn-primary">Tambah Kegiatan</a></div>
        @endif
    </div>
</div>

@foreach($ekstrakurikuler as $item)
<div class="modal fade" id="deleteModal{{ $item->id }}"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title">Konfirmasi Hapus</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body">Yakin hapus <strong>"{{ $item->nama_kegiatan }}"</strong>?</div><div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button><form action="{{ route('ekstrakurikuler.destroy', $item->id) }}" method="POST">@csrf @method('DELETE')<button type="submit" class="btn btn-danger">Hapus</button></form></div></div></div></div>
@endforeach
@endsection