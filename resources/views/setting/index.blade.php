@extends('layouts.app')

@section('content')
<h3>Setting Profil</h3>
<form action="{{ route('setting.update') }}" method="POST">
@csrf
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control">
    </div>
    <button class="btn btn-success">Update Profil</button>
</form>

<hr>

<h5>Ganti Password</h5>
<form action="{{ route('setting.password') }}" method="POST">
@csrf
    <div class="mb-3">
        <label>Password Baru</label>
        <input type="password" name="password" class="form-control">
    </div>
    <div class="mb-3">
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" class="form-control">
    </div>
    <button class="btn btn-warning">Ubah Password</button>
</form>
@endsection
