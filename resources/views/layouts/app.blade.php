<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .sidebar { min-height: 100vh; background: #2c3e50; }
        .sidebar .nav-link { color: rgba(255,255,255,0.7); padding: 12px 20px; border-radius: 8px; margin: 2px 10px; transition: all 0.3s; }
        .sidebar .nav-link:hover { background: rgba(255,255,255,0.1); color: white; }
        .sidebar .nav-link.active { background: #3498db; color: white; }
        .sidebar .nav-link i { width: 24px; text-align: center; margin-right: 10px; }
        .sidebar-brand { padding: 20px; text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
        .sidebar-brand h5 { color: white; font-weight: 700; }
        .sidebar-brand small { color: rgba(255,255,255,0.6); }
        .main-content { padding: 20px 30px; background: #f5f6fa; min-height: 100vh; }
        .card-stats { border-left: 4px solid #3498db; transition: all 0.3s; }
        .card-stats:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .stat-number { font-size: 2.2rem; font-weight: 700; color: #2c3e50; }
    </style>
    @stack('styles')
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-md-block bg-dark sidebar">
            <div class="sidebar-brand">
                <h5><i class="bi bi-calendar-event"></i> Ekstra</h5>
                <small>Admin Panel</small>
            </div>
            <ul class="nav flex-column mt-3">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('ekstrakurikuler.*') ? 'active' : '' }}" href="{{ route('ekstrakurikuler.index') }}"><i class="bi bi-calendar-event"></i> Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#reportModal"><i class="bi bi-file-pdf"></i> Laporan PDF</a></li>
                <li class="nav-item mt-3"><form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="nav-link text-danger bg-transparent border-0 w-100 text-start"><i class="bi bi-box-arrow-right"></i> Logout</button></form></li>
            </ul>
        </nav>

        <main class="col-md-10 ms-sm-auto main-content">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                <h4>@yield('title', 'Dashboard')</h4>
                <span class="text-muted">Welcome, {{ Auth::user()->name ?? 'Admin' }}</span>
            </div>

            @if(session('success')) <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div> @endif
            @if(session('error')) <div class="alert alert-danger alert-dismissible fade show">{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div> @endif
            @if($errors->any()) <div class="alert alert-danger"><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div> @endif

            @yield('content')
        </main>
    </div>
</div>

<div class="modal fade" id="reportModal" tabindex="-1"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><h5 class="modal-title"><i class="bi bi-file-pdf text-danger"></i> Cetak Laporan</h5><button type="button" class="btn-close" data-bs-dismiss="modal"></button></div><div class="modal-body"><a href="{{ route('report.ekstrakurikuler') }}" class="btn btn-danger w-100" target="_blank"><i class="bi bi-file-pdf me-2"></i>Laporan Kegiatan Ekstrakurikuler</a></div></div></div></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>