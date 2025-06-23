<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Freelancer - Start Bootstrap Theme</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet"
        type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top">Start Bootstrap</a>
            <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#portfolio">Portfolio</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#about">About</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded"
                            href="#contact">Contact</a></li>
                    <button type="button" class="btn btn-primary"
                        onclick="window.location.href='{{ url('/login') }}'">Login</button>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead bg-primary text-white text-center">
        <div class="container d-flex justify-content-center flex-row gap-3">
            @foreach ($candidate as $index)
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset($index->photo) }}" class="card-img-top" alt="Foto Kandidat">
                    <div class="card-body">
                        <h5 class="card-title text-black">{{ $index->nama }}</h5>
                        <!-- Button trigger modal -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#modal{{ $index->id }}">
                            Detail Kandidat
                        </button>

                        <!-- Modal per kandidat -->
                        <div class="modal fade" id="modal{{ $index->id }}" tabindex="-1"
                            aria-labelledby="modalLabel{{ $index->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                style="max-width: 60%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel{{ $index->id }}">Detail
                                            {{ $index->nama }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-black">
                                        <div class="container-fluid">
                                            <div class="row mb-3">
                                                <h2 class="text-center mb-4">{{ $index->nama }}</h2>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-md-5 text-center mb-3">
                                                    <img src="{{ asset($index->photo) }}"
                                                        class="img-fluid rounded shadow" alt="Foto Kandidat"
                                                        style="max-height: 400px; object-fit: cover;">
                                                </div>

                                                <div class="col-md-7">

                                                    <h4 class="fw-bold mb-3">Profil Kandidat</h4>

                                                    <div class="row mb-2">
                                                        <div class="col-auto">
                                                            <label class="col-form-label fw-bold">Nama</label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-control-plaintext">{{ $index->nama }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <div class="col-auto">
                                                            <label class="col-form-label fw-bold">Moto</label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-control-plaintext">{{ $index->moto }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <div class="col-auto">
                                                            <label class="col-form-label fw-bold">Fakultas</label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-control-plaintext">{{ $index->fakultas }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-2">
                                                        <div class="col-auto">
                                                            <label class="col-form-label fw-bold">Program Studi</label>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="form-control-plaintext">{{ $index->prodi }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <h4 class="fw-bold mb-2">Visi</h4>
                                                        <div class="form-control-plaintext ps-3">{{ $index->visi }}
                                                        </div>
                                                    </div>

                                                    <div class="mb-3">
                                                        <h4 class="fw-bold mb-2">Misi</h4>
                                                        <div class="form-control-plaintext ps-3">{{ $index->misi }}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer d-flex justify-content-center">
                                        {{-- <a href="{{ route('', $index->id) }}" class="btn btn-primary">
                                            Pilih Sekarang
                                        </a> --}}
                                    </div>


                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach




        </div>
    </header>

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">
                        2215 John Daniel Drive
                        <br />
                        Clark, MO 65243
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About Freelancer</h4>
                    <p class="lead mb-0">
                        Freelance is a free to use, MIT licensed Bootstrap theme created by
                        <a href="http://startbootstrap.com">Start Bootstrap</a>
                        .
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Copyright Section-->
    <div class="copyright py-4 text-center text-white">
        <div class="container"><small>Copyright &copy; Your Website 2023</small></div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
