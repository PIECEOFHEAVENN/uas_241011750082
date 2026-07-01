@extends('layouts.frontend')

@section('title', 'Daftar Kegiatan')

@section('content')
<section class="py-5" style="padding-top:100px!important;"><div class="container"><div class="text-center mb-5"><h1 class="section-title">Daftar <span class="highlight">Kegiatan</span></h1><p class="text-muted">Semua kegiatan ekstrakurikuler yang tersedia</p></div><div class="row g-4">@forelse($ekstrakurikuler as $item)<div class="col-md-4"><div class="card card-hover">@if($item->gambar)<img src="{{ asset($item->gambar) }}" class="card-img-top" style="height:200px;object-fit:cover;">@else<div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height:200px;"><i class="bi bi-calendar-event display-3 text-muted"></i></div>@endif<div class="card-body"><h5>{{ $item->nama_kegiatan }}</h5><p class="text-muted small"><i class="bi bi-calendar me-1"></i>{{ $item->hari }} • {{ $item->waktu }}</p><p><span class="badge bg-primary">{{ $item->pembina }}</span></p></div></div></div>@empty<div class="col-12 text-center"><p class="text-muted">Belum ada kegiatan.</p></div>@endforelse</div><div class="mt-4">{{ $ekstrakurikuler->links() }}</div></div></section>
@endsection
