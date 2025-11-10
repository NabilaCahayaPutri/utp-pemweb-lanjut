@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h3>Pengaturan Profil</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card p-4 mb-4">
        <h5>Edit Profil</h5>
        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
            </div>
            <div class="mb-3">
                <label>Foto Profil</label><br>
                @if($user->photo)
                    <img src="{{ asset('storage/photos/'.$user->photo) }}" width="100" class="mb-2 rounded">
                @endif
                <input type="file" name="photo" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <div class="card p-4 mb-4">
        <h5>Ganti Password</h5>
        <form action="{{ route('setting.password') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Password Lama</label>
                <input type="password" name="current_password" class="form-control">
            </div>
            <div class="mb-3">
                <label>Password Baru</label>
                <input type="password" name="new_password" class="form-control">
            </div>
            <div class="mb-3">
                <label>Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-warning">Ubah Password</button>
        </form>
    </div>

    <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" value="{{ $user->name }}">
    <input type="email" name="email" value="{{ $user->email }}">
    <input type="file" name="photo">
    <button type="submit">Simpan</button>
</form>
</div>
@endsection
