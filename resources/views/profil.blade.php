@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="mb-4 text-center">Profil Pengguna</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="text-center mb-3">
            @if ($user->foto)
                <img src="{{ asset('storage/foto/' . $user->foto) }}" class="rounded-circle" width="130" height="130" alt="Foto Profil">
            @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}" class="rounded-circle" width="130" height="130" alt="Default">
            @endif

            <form action="{{ route('profil.deletePhoto') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm mt-2">Hapus Foto</button>
            </form>
        </div>

        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control" value="{{ explode(' ', $user->name)[0] ?? '' }}">
                </div>
                <div class="col-md-6">
                    <label>Nama Belakang</label>
                    <input type="text" name="nama_belakang" class="form-control" value="{{ explode(' ', $user->name)[1] ?? '' }}">
                </div>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}">
            </div>

            <div class="mb-3">
                <label>Nomor Telepon</label>
                <input type="text" name="nomor_telepon" class="form-control" value="{{ $user->nomor_telepon }}">
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="3">{{ $user->alamat }}</textarea>
            </div>

            <div class="mb-3">
                <label>Foto Profil</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary w-100">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
