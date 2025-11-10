@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body text-center p-5">

                    {{-- Foto Profil --}}
                    <div class="position-relative d-inline-block mb-3">
                        @if ($user->foto)
                            <img src="{{ asset('uploads/foto_profil/' . $user->foto) }}"
                                 class="rounded-circle border border-4 border-primary shadow"
                                 width="120" height="120" alt="Foto Profil">
                        @else
                            <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center shadow"
                                 style="width:120px;height:120px;font-size:36px;font-weight:bold;">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                        @endif

                        {{-- Tombol Upload dan Hapus --}}
                        <div class="mt-2">
                            <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="d-inline">
                                @csrf
                                <input type="file" name="foto" class="form-control form-control-sm mb-2">
                                <button type="submit" class="btn btn-primary btn-sm">Ganti Foto</button>
                            </form>

                            @if ($user->foto)
                                <form action="{{ route('profil.hapusFoto') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus Foto</button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <h3 class="fw-bold mt-3">{{ $user->name }}</h3>
                    <p class="text-muted">Bergabung sejak {{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('F Y') }}</p>

                    {{-- Form Data Profil --}}
                    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="mt-4 text-start">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Simpan Perubahan</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
