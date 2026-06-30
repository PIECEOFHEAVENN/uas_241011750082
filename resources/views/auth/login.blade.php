<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #2c3e50, #3498db);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .login-card {
            max-width: 400px;
            margin: auto;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .login-card .card-header {
            background: #2c3e50;
            border-radius: 16px 16px 0 0;
            padding: 25px;
            text-align: center;
            color: white;
        }
        .login-card .card-header h3 {
            font-weight: 700;
        }
        .login-card .btn-primary {
            background: #3498db;
            border: none;
            padding: 12px;
            border-radius: 50px;
            font-weight: 600;
        }
        .login-card .btn-primary:hover {
            background: #2980b9;
            transform: scale(1.02);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card login-card">
            <div class="card-header">
                <i class="bi bi-calendar-event fs-1"></i>
                <h3>EkstraKurikuler</h3>
                <p class="mb-0 text-light opacity-75">Admin Panel</p>
            </div>
            <div class="card-body p-4">

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $error)
                            <p class="mb-0">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-box-arrow-in-right me-2"></i>Login
                    </button>
                </form>

                <div class="mt-3 text-center">
                    <small class="text-muted">Demo: admin / password123</small>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
