<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-3">Dashboard</h3>

        <div class="alert alert-success text-center">
            <h4>Selamat datang, {{ Auth::user()->name }}!</h4>
            <p>Email kamu: {{ Auth::user()->email }}</p>
        </div>

        <form action="{{ route('logout') }}" method="POST" class="text-center">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>
</body>
</html>
