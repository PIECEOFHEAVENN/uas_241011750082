<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ekstrakurikuler - UAS')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); box-shadow: 0 2px 20px rgba(0,0,0,0.08); padding: 15px 0; }
        .navbar-brand { font-weight: 800; font-size: 1.5rem; color: #2c3e50 !important; }
        .navbar-brand span { color: #3498db; }
        .nav-link { font-weight: 500; color: #4a5568 !important; transition: all 0.3s; padding: 8px 16px !important; border-radius: 8px; }
        .nav-link:hover { color: #3498db !important; background: rgba(52, 152, 219, 0.08); }
        .btn-admin { background: #3498db; color: white !important; border-radius: 50px; padding: 8px 20px !important; font-weight: 600; }
        .btn-admin:hover { background: #2980b9; color: white !important; transform: translateY(-2px); }
        .footer { background: #1a202c; color: #a0aec0; padding: 50px 0 30px; }
        .footer h5 { color: white; font-weight: 700; }
        .footer a { color: #a0aec0; text-decoration: none; transition: all 0.3s; }
        .footer a:hover { color: #3498db; }
        .section-title { font-weight: 800; font-size: 2.5rem; color: #2c3e50; margin-bottom: 10px; }
        .section-title .highlight { color: #3498db; }
        .card-hover { transition: all 0.4s ease; border: none; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.06); }
        .card-hover:hover { transform: translateY(-10px); box-shadow: 0 20px 40px rgba(0,0,0,0.12); }
        .hero-section { padding: 120px 0 80px; background: linear-gradient(135deg, #e8f0fe 0%, #d4e4f7 100%); }
        .hero-section h1 { font-weight: 800; font-size: 3.2rem; color: #2c3e50; }
        .btn-primary-custom { background: #3498db; border: none; padding: 14px 35px; border-radius: 50px; font-weight: 600; color: white; transition: all 0.3s; text-decoration: none; display: inline-block; }
        .btn-primary-custom:hover { background: #2980b9; transform: translateY(-3px); box-shadow: 0 15px 35px rgba(52, 152, 219, 0.3); color: white; }
        .btn-outline-custom { border: 2px solid #3498db; color: #3498db; padding: 14px 35px; border-radius: 50px; font-weight: 600; transition: all 0.3s; text-decoration: none; display: inline-block; background: transparent; }
        .btn-outline-custom:hover { background: #3498db; color: white; transform: translateY(-3px); }
    </style>
    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><i class="bi bi-calendar-event me-2"></i>Ekstra<span>Kurikuler</span></a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('public.ekstrakurikuler') ? 'active' : '' }}" href="{{ route('public.ekstrakurikuler') }}">Kegiatan</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a></li>
                <li class="nav-item ms-lg-2"><a class="nav-link btn-admin" href="{{ route('dashboard') }}"><i class="bi bi-shield-lock-fill me-1"></i> Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <h5><i class="bi bi-calendar-event me-2"></i>EkstraKurikuler</h5>
                <p class="text-muted">Informasi kegiatan ekstrakurikuler Mahasiswa.</p>
            </div>
            <div class="col-md-4">
                <h5>Link Cepat</h5>
                <div class="d-flex flex-column gap-2">
                    <a href="{{ route('home') }}"><i class="bi bi-chevron-right me-1"></i>Beranda</a>
                    <a href="{{ route('about') }}"><i class="bi bi-chevron-right me-1"></i>Tentang</a>
                    <a href="{{ route('public.ekstrakurikuler') }}"><i class="bi bi-chevron-right me-1"></i>Kegiatan</a>
                    <a href="{{ route('contact') }}"><i class="bi bi-chevron-right me-1"></i>Kontak</a>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Kontak</h5>
                <p><i class="bi bi-geo-alt me-2"></i> Jl. Puspitek, Buaran, Kec. Pamulang, Kota Tangerang Selatan, Banten 15310</p>
                <p><i class="bi bi-envelope me-2"></i>info@ekstrakurikuler.com</p>
            </div>
        </div>
        <div class="footer-bottom text-center pt-3 mt-3 border-top border-secondary">
            <p class="mb-0">&copy; {{ date('Y') }} EkstraKurikuler - UAS Rekayasa Web</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>