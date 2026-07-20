<x-sidebar title="Laporan">
    <h2 class="mb-2 fw-bold">Laporan</h2>

    <div class="d-flex align-items-center gap-2 mb-4">
        <label for="filterTahun" class="fw-semibold mb-0">Periode:</label>
        <select id="filterTahun" class="form-select" style="width: auto;"
            onchange="window.location.href='{{ route('reports.index') }}?tahun=' + this.value">
            <option value="semua" {{ $tahunTerpilih == 'semua' ? 'selected' : '' }}>Semua Tahun</option>
            @foreach($tahunTersedia as $tahun)
                <option value="{{ $tahun }}" {{ (string) $tahunTerpilih === (string) $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
            @endforeach
        </select>
    </div>

    <div class="row g-4">
        <!-- Laporan Anggota -->
        <div class="col-12">
            <div class="dashboard-card p-4 d-flex align-items-center justify-content-between gap-3" style="min-height: auto;">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-clean icon-blue flex-shrink-0"><i class="bi bi-people"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1" style="font-size: 16px;">Laporan Anggota</h5>
                        <p class="text-muted small mb-0">Rekap data seluruh anggota aktif and tidak aktif.</p>
                    </div>
                </div>
                <a href="{{ route('reports.export', 'anggota') }}" class="download-report-btn btn-blue btn-sm flex-shrink-0 px-3 py-2">
                    <i class="bi bi-download"></i> Unduh
                </a>
            </div>
        </div>
        <!-- Laporan Kegiatan -->
        <div class="col-12">
            <div class="dashboard-card p-4 d-flex align-items-center justify-content-between gap-3" style="min-height: auto;">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-clean icon-green flex-shrink-0"><i class="bi bi-calendar-event"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1" style="font-size: 16px;">Laporan Kegiatan</h5>
                        <p class="text-muted small mb-0">Rekap seluruh kegiatan beserta peserta dan status.</p>
                    </div>
                </div>
                <a href="{{ route('reports.export', ['jenis' => 'kegiatan', 'tahun' => $tahunTerpilih]) }}" class="download-report-btn btn-green btn-sm flex-shrink-0 px-3 py-2">
                    <i class="bi bi-download"></i> Unduh
                </a>
            </div>
        </div>
        <!-- Laporan Keuangan -->
        <div class="col-12">
            <div class="dashboard-card p-4 d-flex align-items-center justify-content-between gap-3" style="min-height: auto;">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-clean icon-orange flex-shrink-0"><i class="bi bi-wallet2"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1" style="font-size: 16px;">Laporan Keuangan</h5>
                        <p class="text-muted small mb-0">Rekap pemasukan, pengeluaran, dan saldo kas.</p>
                    </div>
                </div>
                <a href="{{ route('reports.export', 'keuangan') }}" class="download-report-btn btn-orange btn-sm flex-shrink-0 px-3 py-2">
                    <i class="bi bi-download"></i> Unduh
                </a>
            </div>
        </div>
        <!-- Laporan Absensi -->
        <div class="col-12">
            <div class="dashboard-card p-4 d-flex align-items-center justify-content-between gap-3" style="min-height: auto;">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-clean icon-purple flex-shrink-0"><i class="bi bi-check2-square"></i></div>
                    <div>
                        <h5 class="fw-bold mb-1" style="font-size: 16px;">Laporan Absensi</h5>
                        <p class="text-muted small mb-0">Rekap kehadiran anggota per kegiatan.</p>
                    </div>
                </div>
                <a href="{{ route('reports.export', ['jenis' => 'absensi', 'tahun' => $tahunTerpilih]) }}" class="download-report-btn btn-grey btn-sm flex-shrink-0 px-3 py-2">
                    <i class="bi bi-download"></i> Unduh
                </a>
            </div>
        </div>
    </div>

</x-sidebar>
