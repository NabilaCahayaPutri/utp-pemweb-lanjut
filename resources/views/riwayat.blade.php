<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Laporan | Findit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
    @include('components.navbar')

    <main class="container mx-auto px-4 py-4">
        <!-- Judul -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Riwayat Laporan Saya</h1>

            <!-- Filter -->
            <form method="GET" action="{{ route('riwayat') }}" class="mt-3">
                <select name="filter" onchange="this.form.submit()"
                        class="border border-gray-300 text-gray-700 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-300">
                    <option value="">Semua Laporan</option>
                    <option value="Barang Hilang" {{ request('filter')=='Barang Hilang'?'selected':'' }}>Barang Hilang</option>
                    <option value="Barang Ditemukan" {{ request('filter')=='Barang Ditemukan'?'selected':'' }}>Barang Ditemukan</option>
                </select>
            </form>
        </div>

        <!-- Daftar Laporan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($laporan as $item)
                <div class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition">
                    <img src="{{ asset('storage/'.$item->foto) }}" 
                         alt="{{ $item->nama_barang }}" 
                         class="rounded-lg mb-3 w-full h-40 object-cover">

                    <h3 class="font-semibold text-lg text-gray-800">{{ $item->nama_barang }}</h3>
                    <p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $item->deskripsi }}</p>

                    <div class="mt-2 text-sm space-y-1">
                         <p><strong>📞 Nomor Telepon:</strong> {{ $item->nomor_telepon }}</p>
                <p><strong>📍 Lokasi:</strong> {{ $item->lokasi }}</p>
                <p><strong>📅 Tanggal:</strong> {{ $item->tanggal }}</p>
                        <span class="inline-block text-xs font-semibold px-3 py-1 rounded-full 
                            {{ $item->jenis_laporan == 'Barang Hilang' ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                            {{ $item->jenis_laporan }}
                        </span>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('laporan.edit', $item->id) }}" 
                           class="bg-yellow-400 hover:bg-yellow-500 text-white font-medium px-4 py-2 rounded-lg transition">Edit</a>

                        <form action="{{ route('laporan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 hover:bg-red-600 text-white font-medium px-4 py-2 rounded-lg transition">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center col-span-3 py-10">Belum ada laporan.</p>
            @endforelse
        </div>
    </main>
</body>
</html>
