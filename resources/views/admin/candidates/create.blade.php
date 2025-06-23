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


</head>

<body id="page-top">

    <div class="main-container-wrapper"> {{-- Pembungkus utama untuk flexbox --}}
        <x-sidebar></x-sidebar>

        {{-- Perbaikan: Hapus kutip ganda ganda pada id="main-content flex-grow-1"" --}}
        <div class="main-content"> {{-- Cukup gunakan class "main-content" dan atur di CSS --}}

            <x-topbar></x-topbar>
            {{-- Main content area --}}
            <main class="content p-4 flex-grow-1"> {{-- Menambahkan flex-grow-1 agar konten mengisi ruang --}}
                <div class="container mt-4">
                    <h2>{{ isset($candidate) ? 'Edit Kandidat' : 'Tambah Kandidat' }}</h2>

                    <form
                        action="{{ isset($candidate) ? route('candidate.update', $candidate->id) : route('candidate.store') }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if (isset($candidate))
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" id="nama" name="nama" class="form-control"
                                    value="{{ old('nama', $candidate->nama ?? '') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="npm" class="form-label">NPM</label>
                                <input type="text" id="npm" name="npm" class="form-control"
                                    value="{{ old('npm', $candidate->npm ?? '') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="umur" class="form-label">Umur</label>
                                <input type="number" id="umur" name="umur" class="form-control"
                                    value="{{ old('umur', $candidate->umur ?? '') }}" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="fakultas" class="form-label">Fakultas</label>
                                <input type="text" id="fakultas" name="fakultas" class="form-control"
                                    value="{{ old('fakultas', $candidate->fakultas ?? '') }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" id="prodi" name="prodi" class="form-control"
                                    value="{{ old('prodi', $candidate->prodi ?? '') }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="moto" class="form-label">Moto</label>
                            <input type="text" id="moto" name="moto" class="form-control"
                                value="{{ old('moto', $candidate->moto ?? '') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="visi" class="form-label">Visi</label>
                            <input type="text" id="visi" name="visi" class="form-control"
                                value="{{ old('visi', $candidate->visi ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label for="misi" class="form-label">Misi</label>
                            <textarea id="misi" name="misi" class="form-control" rows="3">{{ old('misi', $candidate->misi ?? '') }}</textarea>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="photo" class="form-control"
                                {{ isset($candidate) ? '' : 'required' }}>
                            @if (isset($candidate) && $candidate->photo)
                                <img src="{{ asset('storage/' . $candidate->photo) }}" class="img-thumbnail mt-2"
                                    style="max-height: 100px;">
                            @endif
                        </div>

                        <button type="submit"
                            class="btn btn-success">{{ isset($candidate) ? 'Update' : 'Simpan' }}</button>
                        <a href="{{ route('candidate') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </main>
        </div> {{-- Penutup main-content --}}
    </div> {{-- Penutup main-container-wrapper --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
