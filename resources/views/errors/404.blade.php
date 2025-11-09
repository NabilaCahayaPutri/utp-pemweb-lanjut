<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404 - Halaman Tidak Ditemukan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #333;
            overflow: hidden;
        }

        .container {
            text-align: center;
            padding: 2rem;
            max-width: 600px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .error-code {
            font-size: 150px;
            font-weight: bold;
            line-height: 1;
            margin-bottom: 20px;
            color: #2563eb;
            text-shadow: 0 4px 10px rgba(37, 99, 235, 0.2);
        }

        .error-title {
            font-size: 36px;
            margin-bottom: 15px;
            font-weight: 600;
            color: #1e293b;
        }

        .error-message {
            font-size: 18px;
            margin-bottom: 40px;
            color: #64748b;
            line-height: 1.6;
        }

        .btn-home {
            display: inline-block;
            padding: 15px 40px;
            background: #2563eb;
            color: #fff;
            text-decoration: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-home:hover {
            background: #1d4ed8;
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }



        @media (max-width: 768px) {
            .error-code {
                font-size: 100px;
            }

            .error-title {
                font-size: 28px;
            }

            .error-message {
                font-size: 16px;
            }

            .illustration svg {
                width: 150px;
                height: 150px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-code">404</div>
        <h1 class="error-title">Halaman Tidak Ditemukan</h1>
        <p class="error-message">
            Maaf, halaman yang Anda cari tidak dapat ditemukan. 
            Mungkin halaman telah dipindahkan atau tidak pernah ada.
        </p>
        <a href="/" class="btn-home">Kembali ke Beranda</a>
    </div>
</body>
</html>