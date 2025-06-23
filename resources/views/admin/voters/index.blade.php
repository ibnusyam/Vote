<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard E-Voting - Kandidat</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/adminStyle.css') }}">

    <style>
        /* CSS Tambahan untuk membuat layout ini full dalam satu file */
        html,
        body {
            width: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Mencegah scroll horizontal pada html/body */
        }

        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            /* overflow-x: hidden; - Dipindahkan ke html, body */
        }
    </style>
</head>

<body id="page-top">

    <div class="main-container-wrapper"> {{-- Pembungkus utama untuk flexbox --}}
        <x-sidebar></x-sidebar>

        {{-- Perbaikan: Hapus kutip ganda ganda pada id="main-content flex-grow-1"" --}}
        <div class="main-content"> {{-- Cukup gunakan class "main-content" dan atur di CSS --}}

            <x-topbar></x-topbar>
            {{-- Main content area --}}
            <main class="content p-4 flex-grow-1"> {{-- Menambahkan flex-grow-1 agar konten mengisi ruang --}}
                <div class="d-flex justify-content-between align-items-center mb-4"> {{-- Tambahkan align-items-center --}}
                    <h2 class="mb-0 text-dark">Daftar Pemilih</h2> {{-- Tambahkan text-dark --}}
                    <a href="{{ route('voter.create') }}" class="btn btn-primary btn-color">
                        <i class="bi bi-person-plus-fill me-2"></i>Tambah Kandidat
                    </a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card shadow-sm mb-4"> {{-- Membungkus tabel dalam card --}}
                    <div class="">
                        <div class="table-responsive"> {{-- Penting untuk tabel lebar --}}
                            <table class="table table-hover align-middle"> {{-- Menambahkan align-middle --}}
                                <thead class="table-dark">
                                    <tr>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Pilihan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voters as $index)
                                        <tr>
                                            <td>{{ $index->nim }}</td>
                                            <td>{{ $index->nama ?? '-' }}</td>
                                            <td>{{ $index->candidate->nama ?? '-' }}</td>
                                            <td>
                                                <form action="{{ route('voter.destroy', $index->id) }}"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus voter {{ $index->nim }}? Aksi ini tidak dapat dibatalkan.')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        title="Hapus Voter">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </main>

            <footer class="sticky-footer bg-light py-4 mt-5 flex-shrink-0">
                <div class="container my-auto">
                    <div class="copyright text-center text-muted">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>

        </div> {{-- Penutup main-content --}}
    </div> {{-- Penutup main-container-wrapper --}}

    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Siap untuk Keluar?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <a class="btn btn-color" href="login.html">Keluar</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
