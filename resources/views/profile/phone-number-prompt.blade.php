<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masukkan Nomor Telepon - Revoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
            padding: 1.5rem;
        }
        .prompt-card {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 24px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3), 0 8px 10px -6px rgba(0, 0, 0, 0.3);
            max-width: 450px;
            width: 100%;
            padding: 2.5rem;
        }
        .icon-circle {
            width: 72px;
            height: 72px;
            background-color: rgba(14, 165, 233, 0.1);
            color: #0ea5e9;
            font-size: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem auto;
        }
        .form-control:focus {
            background-color: transparent !important;
            color: #fff !important;
            border-color: #0ea5e9 !important;
            box-shadow: 0 0 0 0.25rem rgba(14, 165, 233, 0.25) !important;
        }
    </style>
</head>
<body>
    <div class="prompt-card text-center">
        <div class="icon-circle">
            <i class="bi bi-telephone-fill"></i>
        </div>
        <h4 class="fw-bold mb-2">Masukkan Nomor Telepon</h4>
        <p class="text-muted small mb-4">
            Halo <strong>{{ auth()->user()->name }}</strong>, sebelum dapat mengakses seluruh halaman web, mohon isi nomor telepon aktif Anda terlebih dahulu.
        </p>

        @if(session('error'))
            <div class="alert alert-danger rounded-3 text-start small mb-3">
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger rounded-3 text-start small mb-3">
                <ul class="mb-0 ps-3">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('phone_number.update') }}" method="POST" class="mb-3">
            @csrf
            <div class="mb-4 text-start">
                <label class="form-label fw-semibold text-secondary small">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-secondary text-secondary"><i class="bi bi-telephone"></i></span>
                    <input type="text" name="no_hp" class="form-control bg-transparent border-secondary text-white" 
                           placeholder="Contoh: 08123456789" required autofocus>
                </div>
                <div class="form-text text-muted small mt-2">Masukkan nomor telepon yang aktif dan valid.</div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2.5 rounded-3 fw-bold mb-2">
                Simpan & Lanjutkan
            </button>
        </form>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none text-muted small w-100 p-0">
                Keluar (Logout)
            </button>
        </form>
    </div>
</body>
</html>
