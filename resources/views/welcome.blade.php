<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Findit | Sistem Barang Hilang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #f9fafb;
        }

        /* Navbar */
        .navbar {
            background-color: #fff;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: #2563eb !important;
        }

        .nav-link {
            color: #374151 !important;
            font-weight: 500;
        }

        .nav-link:hover {
            color: #2563eb !important;
        }

        /* Hero section */
        .hero {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
            padding: 0 20px;
        }

        .hero h1 {
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 15px;
        }

        .hero p {
            color: #6b7280;
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .btn-login {
            background-color: #2563eb;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 500;
        }

        .btn-login:hover {
            background-color: #1d4ed8;
        }

        .btn-register {
            background-color: #10b981;
            border: none;
            border-radius: 10px;
            padding: 10px 25px;
            font-weight: 500;
        }

        .btn-register:hover {
            background-color: #059669;
        }

        footer {
            margin-top: 80px;
            text-align: center;
            color: #9ca3af;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="#">Findit</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Sistem Informasi Barang Hilang</h1>
            <p>Temukan atau laporkan barang hilang dengan mudah dan cepat bersama Findit</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="/login" class="btn btn-login text-white">Login</a>
                <a href="/register" class="btn btn-register text-white">Daftar</a>
            </div>
        </div>
    </section>

  <footer>
    Selamat Datang di Findit &copy; 2025
</footer>

</body>
</html>