<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Revoria' }} - Karang Taruna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <!-- SIDEBAR -->
            <div class="col-lg-2 sidebar">
                <div class="logo">
                    <h4 class="text-white mb-0">REVORIA</h4>
                </div>
                <ul class="nav flex-column mt-4">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-house"></i> Dashboard
                        </a>
                    </li>
                    @if(auth()->user()->isKetua())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}" href="{{ route('members.index') }}">
                            <i class="bi bi-people"></i> Anggota
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('kegiatan.*') ? 'active' : '' }}" href="{{ route('kegiatan.index') }}">
                            <i class="bi bi-calendar-event"></i> Kegiatan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('absensi.*') ? 'active' : '' }}" href="{{ route('absensi.index') }}">
                            <i class="bi bi-check2-square"></i> Absensi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dokumen.*') ? 'active' : '' }}" href="{{ route('dokumen.index') }}">
                            <i class="bi bi-folder"></i> Dokumen
                        </a>
                    </li>
                    @if(auth()->user()->isKetua())
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('keuangan.*') ? 'active' : '' }}" href="{{ route('keuangan.index') }}">
                            <i class="bi bi-wallet2"></i> Keuangan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" href="{{ route('reports.index') }}">
                            <i class="bi bi-file-earmark-text"></i> Laporan
                        </a>
                    </li>
                    @endif
                </ul>
                <div class="logout">
                    <!-- Profile Card -->
                    <div class="card bg-white bg-opacity-10 border-0 rounded-4 mb-3 p-3 text-white">
                        <div class="d-flex align-items-center gap-2">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 32px; height: 32px; background: rgba(255,255,255,0.2);">
                                <i class="bi bi-person-fill"></i>
                            </div>
                            <div class="overflow-hidden">
                                <h6 class="mb-0 fw-semibold text-truncate" style="font-size: 14px;">{{ auth()->user()->name }}</h6>
                                <small class="text-white-50 text-truncate d-block" style="font-size: 11px;">{{ auth()->user()->email }}</small>
                            </div>
                        </div>
                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-light w-100 mt-3 text-start d-flex align-items-center justify-content-between rounded-3 py-2 px-3 text-decoration-none" style="background: rgba(255, 255, 255, 0.15); border: 0; color: white; font-size: 12px;">
                            <span><i class="bi bi-gear me-2"></i> Pengaturan</span>
                            <i class="bi bi-chevron-right small opacity-50"></i>
                        </a>
                    </div>

                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn text-start w-100 text-decoration-none d-flex align-items-center py-2 px-3 rounded-3" style="background: rgba(220, 53, 69, 0.15); border: 1px solid rgba(220, 53, 69, 0.25); color: #f87171; font-size: 14px;">
                            <i class="bi bi-box-arrow-right me-2"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>

            <!-- CONTENT -->
            <div class="col-lg-10 content">
                {{ $slot }}
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
