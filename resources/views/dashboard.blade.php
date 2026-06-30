@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3 mb-4">
        <div class="card card-stats border-0 shadow-sm h-100">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div><h6 class="text-muted">Total Kegiatan</h6><h2 class="stat-number">{{ $total_kegiatan ?? 0 }}</h2></div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle"><i class="bi bi-calendar-event fs-2 text-primary"></i></div>
                </div>
                <a href="{{ route('ekstrakurikuler.index') }}" class="text-decoration-none mt-2 d-inline-block">Lihat Detail <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12">
        <div class="card border-0 shadow-sm">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div><i class="bi bi-person-circle fs-3 me-2 text-primary"></i> <strong>Selamat datang, {{ Auth::user()->name }}!</strong></div>
                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Online</span>
            </div>
        </div>
    </div>
</div>
@endsection