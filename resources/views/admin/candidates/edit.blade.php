<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard E-Voting</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="{{ asset('css/adminStyle.css') }}">
</head>
<body id="page-top">

    <div class="main-container-wrapper">
        <x-sidebar></x-sidebar>

        <div class="main-content">
            <x-topbar></x-topbar>
            <main class="content p-4 flex-grow-1">
                <div class="container-fluid mt-4"> {{-- Gunakan container-fluid untuk form yang lebih lebar --}}
                    <h2 class="mb-4">Edit Kandidat</h2> {{-- Judul fix Edit Kandidat --}}

                    <form action="{{ route('candidate.update', $candidate->id) }}" method="POST" enctype="multipart/form-data" class="card shadow-sm p-4">
                        @csrf
                        @method('PUT') {{-- Selalu gunakan PUT untuk update --}}

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror"
                                    value="{{ old('nama', $candidate->nama ?? '') }}" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="text" id="npm" name="npm" class="form-control @error('npm') is-invalid @enderror"
                                    value="{{ old('npm', $candidate->npm ?? '') }}" required>
                                @error('npm')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number" id="umur" name="umur" class="form-control @error('umur') is-invalid @enderror"
                                    value="{{ old('umur', $candidate->umur ?? '') }}" required>
                                @error('umur')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="fakultas" class="form-label">Fakultas</label>
                                <input type="text" id="fakultas" name="fakultas" class="form-control @error('fakultas') is-invalid @enderror"
                                    value="{{ old('fakultas', $candidate->fakultas ?? '') }}" required>
                                @error('fakultas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" id="prodi" name="prodi" class="form-control @error('prodi') is-invalid @enderror"
                                    value="{{ old('prodi', $candidate->prodi ?? '') }}" required>
                                @error('prodi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="moto" class="form-label">Moto</label>
                                <input type="text" id="moto" name="moto" class="form-control @error('moto') is-invalid @enderror"
                                    value="{{ old('moto', $candidate->moto ?? '') }}">
                                @error('moto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Visi dan Misi tetap satu baris penuh --}}
                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <textarea id="visi" name="visi" class="form-control @error('visi') is-invalid @enderror" rows="3">{{ old('visi', $candidate->visi ?? '') }}</textarea>
                            @error('visi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea id="misi" name="misi" class="form-control @error('misi') is-invalid @enderror" rows="5">{{ old('misi', $candidate->misi ?? '') }}</textarea>
                            @error('misi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="form-label d-block">Foto</label> {{-- d-block agar label di atas gambar --}}
                            @if (isset($candidate) && $candidate->photo)
                                <div class="mb-2">
                                    <img src="{{ asset('photos/' . $candidate->photo) }}" class="img-thumbnail rounded"
                                        alt="Foto Kandidat Saat Ini" style="max-height: 150px; object-fit: cover;">
                                    <small class="text-muted ms-2">Foto saat ini</small>
                                </div>
                            @endif
                            <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror"> {{-- Tidak required saat edit --}}
                            <div class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto. Maks. ukuran 2MB.</div>
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-success me-2">Update</button> {{-- Teks tombol Update --}}
                            <a href="{{ route('candidate') }}" class="btn btn-secondary">Kembali</a> {{-- Kembali ke index --}}
                        </div>
                    </form>
                </div>
            </main>

        </div> {{-- Penutup main-content --}}
    </div> {{-- Penutup main-container-wrapper --}}

    <!-- Scroll to Top Button (Opsional, jika Anda mau tetap ada di file ini) -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal (Opsional, jika Anda mau tetap ada di file ini) -->
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Siap untuk Keluar?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a class="btn btn-color" href="login.html">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Scripts -->
</body>
</html>
