<!DOCTYPE html>
<html>
<head>
    <title>Tambah Voter Baru (Massal)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        .card {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 600px;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .form-group label {
            font-weight: 600;
            margin-bottom: 8px;
            display: block;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            transition: border-color 0.3s;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
        }
        .btn {
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #545b62;
            transform: translateY(-2px);
        }
        .text-danger {
            font-size: 0.875em;
            margin-top: 5px;
        }
        .alert {
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="card">
    <h2>Tambah Voter Baru (Massal)</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('voter.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group mb-3">
                    <label for="nims_input">Daftar NIM (Satu NIM per baris):</label>
                    <textarea name="nims_input" id="nims_input" class="form-control" rows="10"
                              placeholder="Masukkan NIM di sini, satu per baris. Contoh:&#10;1234567890&#10;0987654321&#10;...">{{ old('nims_input') }}</textarea>
                    @error('nims_input')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-4">
                <button type="submit" class="btn btn-primary me-2">Simpan Voter</button>
                <a class="btn btn-secondary" href="{{ route('vote') }}">Kembali</a>
            </div>
        </div>
    </form>
</div>
</body>
</html>
