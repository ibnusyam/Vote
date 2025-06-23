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

<body>

    <div class="d-flex">
        <x-sidebar></x-sidebar>

        <div class="main-content flex-grow-1">
            <x-topbar></x-topbar>

            <main class="content p-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold">Dasboard</h2>
                        <p class="text-muted">Selamat datang di Website E-Voting</p>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">E-Voting</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dasbor</li>
                        </ol>
                    </nav>
                </div>

                <div class="row g-4 justify-content-center mb-3">
                    @foreach ($candidate as $index)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="card shadow-sm border-0 h-100">
                                <div class="card-body text-center d-flex flex-column">

                                    <img src="{{ asset('photos/' . $index->photo) }}"
                                        class="candidate-avatar img-fluid rounded-circle" alt="{{ $index->nama }}">

                                    <h5 class="card-title mt-3">{{ $index->nama }}</h5>

                                    <div class="mt-auto">
                                        <p class="text-muted mb-1">Jumlah Suara</p>
                                        <h1 class="display-5 fw-bold">{{ $voteCounts[$index->id] ?? 0 }}</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-3">
                        <div class="card stat-card text-center border-0 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-people-fill text-primary fs-2"></i>
                                <h3 class="card-title my-2 fw-bold">{{ $jumlahKandidat }}</h3>
                                <p class="card-text text-muted">Jumlah Kandidat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card stat-card text-center border-0 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-person-fill text-warning fs-2"></i>
                                <h3 class="card-title my-2 fw-bold">{{ $jumlahPemilih }}</h3>
                                <p class="card-text text-muted">Jumlah Pemilih</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card stat-card text-center border-0 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-check-circle-fill text-success fs-2"></i>
                                <h3 class="card-title my-2 fw-bold">{{ $sudahMemilih }}</h3>
                                <p class="card-text text-muted">Sudah Memilih</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <div class="card stat-card text-center border-0 shadow-sm">
                            <div class="card-body">
                                <i class="bi bi-x-circle-fill text-danger fs-2"></i>
                                <h3 class="card-title my-2 fw-bold">{{ $belumMemilih }}</h3>
                                <p class="card-text text-muted">Belum Memilih</p>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
