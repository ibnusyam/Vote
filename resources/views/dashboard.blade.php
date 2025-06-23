<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Platform E-Voting Modern" />
    <meta name="author" content="" />
    <title>E-Voting - {{ $dashboard->judul ?? 'Pemilihan Kandidat' }}</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Lato', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6, .navbar-brand {
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
        .btn-social {
            border-radius: 100%;
            display: inline-flex;
            width: 3.25rem;
            height: 3.25rem;
            font-size: 1.25rem;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark text-uppercase fixed-top shadow-sm" id="mainNav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">E-Voting</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#portfolio">Portfolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="/about">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#contact">Contact</a></li>
                    <li class="nav-item mx-0 mx-lg-1 d-flex align-items-center">
                        <a href="{{ url('/login') }}" class="btn btn-primary rounded">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead bg-secondary bg-gradient text-white text-center"
        style="padding-top: 10rem; padding-bottom: 6rem;">
        <div class="container d-flex align-items-center flex-column">

            @if (session('error'))
                <div class="alert alert-danger shadow-sm col-md-8 mx-auto">
                    {{ session('error') }}
                </div>
            @endif

            <h1 class="display-5 text-uppercase fw-bold mb-3">{{ $dashboard->judul ?? 'Judul Pemilihan' }}</h1>

            <p class="fs-5 fw-light fst-italic mb-5">
                "{{ $dashboard->quotes ?? 'Pilih pemimpin masa depan Anda dengan bijak.' }}"</p>

            <div class="container">
                <div class="row justify-content-center g-4">
                    @foreach ($candidate as $index)
                        <div class="col-md-6 col-lg-4">
                            <div class="card bg-light text-dark shadow-lg rounded-4 border-0 h-100">
                                <img src="{{ asset('photos/' . $index->photo) }}" class="card-img-top"
                                    alt="Foto Kandidat" style="height: 300px; object-fit: cover; object-position: top;">
                                <div class="card-body text-center p-4">
                                    <h5 class="card-title fw-bold fs-4">{{ $index->nama }}</h5>
                                    @if (!empty($index->moto))
                                        <p class="card-text text-muted fst-italic">"{{ $index->moto }}"</p>
                                    @endif
                                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal"
                                        data-bs-target="#modal{{ $index->id }}">
                                        Lihat Detail
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="modal{{ $index->id }}" tabindex="-1"
                            aria-labelledby="modalLabel{{ $index->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content shadow-lg rounded-4">
                                    <div class="modal-header bg-dark text-white border-0">
                                        <h5 class="modal-title" id="modalLabel{{ $index->id }}">Detail Kandidat</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4 text-black">
                                        <div class="container-fluid">
                                            <div class="row align-items-center">
                                                <div class="col-lg-4 text-center mb-4 mb-lg-0">
                                                    <img src="{{ asset('photos/' . $index->photo) }}"
                                                        class="img-fluid rounded-circle shadow-sm" alt="Foto Kandidat"
                                                        style="width: 200px; height: 200px; object-fit: cover; object-position: top;">
                                                    <h4 class="fw-bold mt-3 mb-1">{{ $index->nama }}</h4>
                                                    <p class="text-muted mb-0">{{ $index->fakultas }}</p>
                                                    <p class="text-muted">{{ $index->prodi }}</p>
                                                </div>

                                                <div class="col-lg-8 text-start">
                                                    @if (!empty($index->moto))
                                                        <div class="mb-3">
                                                            <h5 class="fw-bold">Moto</h5>
                                                            <p class="fst-italic">"{{ $index->moto }}"</p>
                                                        </div>
                                                    @endif
                                                    @if (!empty($index->visi))
                                                        <div class="mb-3">
                                                            <h5 class="fw-bold">Visi</h5>
                                                            <p>{{ $index->visi }}</p>
                                                        </div>
                                                    @endif
                                                    @if (!empty($index->misi))
                                                        <div>
                                                            <h5 class="fw-bold">Misi</h5>
                                                            <div class="ps-2">{!! nl2br(e($index->misi)) !!}</div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-center border-0 bg-light">
                                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                                            data-bs-target="#formModal" data-candidate-id="{{ $index->id }}">
                                            Pilih {{ $index->nama }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="button" class="btn btn-info btn-lg mt-5 shadow" data-bs-toggle="modal"
                data-bs-target="#formModal">
                <i class="fas fa-vote-yea me-2"></i>Beri Suara Sekarang
            </button>
        </div>
    </header>

    <div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-lg">
                <form method="POST" action="{{ route('vote') }}">
                    @csrf
                    <div class="modal-header bg-primary text-white border-0">
                        <h5 class="modal-title" id="formModalLabel">Formulir Pemilihan Suara</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="candidate" class="form-label fw-bold">Kandidat Pilihan Anda</label>
                            <select class="form-select form-select-lg" id="candidate" name="candidate" required>
                                <option value="" selected disabled>Pilih Kandidat...</option>
                                @foreach ($candidate as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Masukkan Nama Anda" required>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label fw-bold">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                placeholder="Masukkan NIM Anda" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center border-0">
                        <button type="submit" class="btn btn-primary btn-lg">Submit Pilihan Saya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="footer text-center bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">UNIBI<br />SOEKARNO HATTA</p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About E-Voting</h4>
                    <p class="lead mb-0">A modern and responsive e-voting platform.</p>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright py-4 text-center text-white" style="background-color: #000;">
        <div class="container"><small>Copyright &copy; E-VOTING 2025</small></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        const voteModal = document.getElementById('formModal');
        if (voteModal) {
            voteModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const candidateId = button.getAttribute('data-candidate-id');
                if (candidateId) {
                    const candidateSelect = voteModal.querySelector('#candidate');
                    candidateSelect.value = candidateId;
                }
            });
        }
    </script>
</body>

</html>
