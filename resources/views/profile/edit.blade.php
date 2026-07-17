<x-sidebar title="Pengaturan">

    <h2 class="mb-4 fw-bold">Pengaturan</h2>

    <div class="row g-4">

        <!-- Update Info -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="profile-card w-100">
                <h5 class="fw-bold mb-4">Informasi Akun</h5>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf @method('patch')
                    @if(session('status') === 'profile-updated')
                        <div class="alert alert-success rounded-3 py-2">Profil berhasil diperbarui.</div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', auth()->user()->name) }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', auth()->user()->email) }}" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        <!-- Update Password -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="profile-card w-100">
                <h5 class="fw-bold mb-4">Ubah Password</h5>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf @method('put')
                    @if(session('status') === 'password-updated')
                        <div class="alert alert-success rounded-3 py-2">Password berhasil diubah.</div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Password Saat Ini</label>
                        <input type="password" name="current_password"
                            class="form-control @error('current_password', 'updatePassword') is-invalid @enderror">
                        @error('current_password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password Baru</label>
                        <input type="password" name="password"
                            class="form-control @error('password', 'updatePassword') is-invalid @enderror">
                        @error('password', 'updatePassword')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Password</button>
                </form>
            </div>
        </div>

        @if(!in_array(auth()->user()->role, ['pengurus']) || auth()->user()->anggota_id)
        <!-- Hubungkan ke Data Anggota -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="profile-card w-100">
                <h5 class="fw-bold mb-1">Data Anggota</h5>
                <p class="text-muted small mb-3">Hubungkan akun ini ke data anggota agar absensi tercatat atas namamu.</p>
                
                @if(auth()->user()->anggota_id)
                    <div class="alert alert-info rounded-3 py-2 mb-3">
                        <i class="bi bi-link-45deg me-1"></i> Akun Anda sudah terhubung dengan data anggota.
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Anggota Terhubung</label>
                        <input type="text" class="form-control" value="{{ auth()->user()->anggota?->nama ?? '-' }}" disabled>
                    </div>
                @else
                    <form method="POST" action="{{ route('profile.link-anggota') }}">
                        @csrf @method('patch')
                        @if(session('status') === 'anggota-linked')
                            <div class="alert alert-success rounded-3 py-2">Data anggota berhasil dihubungkan.</div>
                        @endif
                        <div class="mb-3">
                            <label class="form-label">Pilih Nama Anggota</label>
                            <select name="anggota_id" class="form-select">
                                <option value="">-- Tidak dihubungkan --</option>
                                @foreach($anggotas as $a)
                                    <option value="{{ $a->id_anggota }}" {{ auth()->user()->anggota_id == $a->id_anggota ? 'selected' : '' }}>
                                        {{ $a->nama }} {{ $a->jabatan ? '('.$a->jabatan.')' : '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                @endif
            </div>
        </div>
        @else
        <!-- Placeholder agar Hapus Akun tetap di sebelah kanan -->
        <div class="col-lg-6 d-none d-lg-block"></div>
        @endif

        <!-- Hapus Akun -->
        <div class="col-lg-6 d-flex align-items-stretch">
            <div class="profile-card border border-danger w-100">
                <h5 class="fw-bold text-danger mb-2">Hapus Akun</h5>
                <p class="text-muted small mb-3">Setelah akun dihapus, semua data akan hilang permanen.</p>
                <button class="btn btn-danger mt-auto" data-bs-toggle="modal" data-bs-target="#modalHapusAkun">
                    Hapus Akun
                </button>
            </div>
        </div>


    </div>

    <!-- Modal Hapus Akun -->
    <div class="modal fade" id="modalHapusAkun" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-danger">Hapus Akun</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST" action="{{ route('profile.destroy') }}">
                    @csrf @method('delete')
                    <div class="modal-body">
                        <p class="text-muted">Masukkan password untuk konfirmasi penghapusan akun.</p>
                        <input type="password" name="password"
                            class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                            placeholder="Password">
                        @error('password', 'userDeletion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-sidebar>
