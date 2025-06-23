<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login E-Voting</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <style>
        /* Opsional: Membuat background dan font lebih serasi */
        body {
            background-color: #f8f9fa; /* Warna abu-abu sangat muda */
            font-family: 'Lato', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', sans-serif;
        }
    </style>
</head>
<body>

    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center p-3">
        <div class="col-xl-10">

            <div class="card shadow-lg rounded-4 overflow-hidden border-0">
                <div class="row g-0">

                    <div class="col-lg-6">
                        <div class="card-body p-4 p-md-5">

                            <div class="text-center mb-4">
                                <i class="fas fa-vote-yea fa-3x text-primary mb-3"></i>
                                <h3 class="fw-bold">Selamat Datang!</h3>
                                <p class="text-muted">Silakan masuk untuk melanjutkan.</p>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com" required>
                                    <label for="email">Alamat Email</label>
                                </div>

                                <div class="form-floating mb-4">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>

                                @if (session('error'))
                                    <div class="alert alert-danger mb-3 py-2">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="d-grid">
                                    <button class="btn btn-primary btn-lg fw-bold" type="submit">Log In</button>
                                </div>

                            </form>

                        </div>
                    </div>

                    <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center bg-primary bg-gradient text-white p-5 rounded-end-4">
                        <div class="text-center">
                            <h2 class="mb-4 fw-bold">SISTEM E-VOTING</h2>
                            <p class="lead">Memilih pemimpin dengan mudah, aman, dan transparan. Suara Anda menentukan masa depan.</p>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
