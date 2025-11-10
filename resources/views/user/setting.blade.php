@extends('layouts.app')

@section('content')
<div class="container mt-4">
    {{-- Pesan sukses atau error --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Kartu Ubah Profil --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">Ubah Profil</h5>

            <form method="POST" action="{{ route('profil.update') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    {{-- Kartu Ubah Password --}}
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="mb-3">Ubah Password</h5>

            <form method="POST" action="{{ route('ubah-password') }}">
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

                <button type="submit" class="btn btn-warning">Ubah Password</button>
            </form>
        </div>
    </div>
</div>
@endsection
