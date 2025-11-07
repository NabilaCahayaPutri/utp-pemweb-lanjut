<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Findit | Daftar Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f9fafb;
            margin: 0;
        }

        .navbar {
            background-color: #fff;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: #2563eb !important;
        }

        .wrapper {
            min-height: calc(100vh - 70px);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            padding: 35px 40px;
            width: 100%;
            max-width: 500px;
        }

        h3 {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 25px;
            text-align: center;
        }

        label {
            font-size: 0.95rem;
            color: #374151;
            font-weight: 500;
        }

        input.form-control {
            font-size: 0.95rem;
            padding: 10px 12px;
            border-radius: 8px;
        }

        .btn-register {
            background-color: #2563eb;
            border: none;
            border-radius: 10px;
            padding: 10px;
            font-weight: 500;
        }

        .btn-register:hover {
            background-color: #1d4ed8;
        }

        .link-login {
            color: #10b981;
            font-weight: 500;
            text-decoration: none;
        }

        .link-login:hover {
            color: #059669;
            text-decoration: underline;
        }

        p.text-center {
            margin-top: 15px;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="/">Findit</a>
        </div>
    </nav>

    <div class="wrapper">
        <div class="register-card">
            <h3>Daftar Akun Baru</h3>

            <form action="/register" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama kamu" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email kamu" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter" minlength="8" required>
                </div>

                <div class="mb-3">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" minlength="8" required>
                </div>

                <button type="submit" class="btn btn-register w-100 text-white mt-2">Daftar</button>

                <p class="text-center">
                    Sudah punya akun?
                    <a href="/login" class="link-login">Login</a>
                </p>
            </form>
        </div>
    </div>

</body>
</html>