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

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .navbar-brand {
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

    <div class="container mt-5 py-5">
        <h1 class="mb-4">Tentang Pemilihan BEM 2021–2022</h1>
        <p>
            Pemilihan Badan Eksekutif Mahasiswa (BEM) tahun 2021–2022 merupakan salah satu agenda demokrasi kampus
            yang bertujuan untuk memilih pemimpin mahasiswa secara langsung, umum, bebas, rahasia, dan jujur.
        </p>
        <p>
            Proses pemilihan ini melibatkan seluruh mahasiswa aktif sebagai pemilih, dan diselenggarakan oleh
            Komisi Pemilihan Umum Mahasiswa (KPUM) dengan harapan dapat melahirkan kepemimpinan yang aspiratif,
            transparan, dan bertanggung jawab.
        </p>
        <p>
            Kandidat yang maju dalam pemilihan telah melalui tahap seleksi administrasi dan debat publik untuk
            menyampaikan visi dan misi mereka. Pemungutan suara dilakukan secara elektronik (e-voting) untuk
            memudahkan partisipasi dan memastikan proses yang efisien dan akuntabel.
        </p>
        <p>
            Mari sukseskan pemilihan BEM 2021–2022 dengan memberikan suara Anda secara bijak!
        </p>

        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-3">Kembali ke Beranda</a>
    </div>

    <footer class="footer text-center bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Location</h4>
                    <p class="lead mb-0">UNIBI<br />Clark, MO 65243</p>
                </div>
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Around the Web</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i
                            class="fab fa-fw fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">About E-Voting</h4>
                    <p class="lead mb-0">A modern and responsive e-voting platform.</p>
                </div>
            </div>
        </div>
    </footer>

    <div class="copyright py-4 text-center text-white" style="background-color: #000;">
        <div class="container"><small>Copyright &copy; Your Website 2025</small></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
