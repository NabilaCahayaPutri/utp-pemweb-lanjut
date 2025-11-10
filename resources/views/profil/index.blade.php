@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Profil Saya</h4>
    <hr>

    <div class="row">
        <div class="col-md-3 text-center">
            @if ($user->photo)
                <img src="{{ asset('storage/profile/' . $user->photo) }}" 
                     alt="Foto Profil" 
                     class="rounded-circle mb-3" 
                     width="150" height="150">
            @else
                <div class="rounded-circle bg-secondary d-flex justify-content-center align-items-center mb-3" 
                     style="width: 150px; height: 150px; color: white;">
                    No Photo
                </div>
            @endif

            <form action="{{ route('profil.deletePhoto') }}" method="POST" onsubmit="return confirm('Hapus foto profil?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm w-100 mb-2">Hapus Foto</button>
            </form>

            <a href="{{ url('/beranda') }}" class="btn btn-secondary btn-sm w-100">Kembali</a>
        </div>

        <div class="col-md-9">
            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
            </form>

            <hr>

            <form action="{{ route('profil.password') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Password Lama</label>
                    <input type="password" name="current_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Konfirmasi Password Baru</label>
                    <input type="password" name="new_password_confirmation" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-warning">Ganti Password</button>
            </form>

            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
