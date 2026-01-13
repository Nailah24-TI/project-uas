<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icon --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/nucleo-icons/2.0.6/css/nucleo-icons.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0f172a, #020617);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #e5e7eb;
        }

        .register-card {
            background: #020617;
            border: 1px solid #1e293b;
            border-radius: 18px;
            padding: 32px;
            width: 100%;
            max-width: 460px;
            box-shadow: 0 20px 40px rgba(0,0,0,.4);
        }

        .register-title {
            font-weight: 800;
            letter-spacing: .5px;
        }

        .form-control {
            background-color: #020617;
            border: 1px solid #334155;
            color: #e5e7eb;
        }

        .form-control:focus {
            background-color: #020617;
            border-color: #22c55e;
            box-shadow: none;
            color: #e5e7eb;
        }

        .btn-register {
            background: linear-gradient(135deg, #22c55e, #16a34a);
            border: none;
            font-weight: 600;
        }

        .btn-register:hover {
            opacity: .9;
        }

        .text-muted {
            color: #94a3b8 !important;
        }

        a {
            color: #22c55e;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="register-card">

    {{-- TITLE --}}
    <div class="text-center mb-4">
        <div class="fs-1 mb-2">⚽</div>
        <h3 class="register-title">Register</h3>
        <p class="text-muted mb-0">
            Daftar Anggota UKM Futsal PCR
        </p>
    </div>

    {{-- ERROR --}}
    @if ($errors->any())
        <div class="alert alert-danger small">
            {{ $errors->first() }}
        </div>
    @endif

    {{-- FORM (LOGIKA TIDAK DIUBAH) --}}
    <form method="POST" action="/register">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Lengkap</label>
            <input
                type="text"
                name="name"
                class="form-control"
                placeholder="Nama lengkap"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="email@example.com"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Minimal 6 karakter"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                placeholder="Ulangi password"
                required
            >
        </div>

        <button class="btn btn-register w-100 py-2 mt-2">
            Daftar
        </button>

        <p class="text-center mt-4 mb-0 text-muted">
            Sudah punya akun?
            <a href="/login">Login</a>
        </p>
    </form>

</div>

</body>
</html>
