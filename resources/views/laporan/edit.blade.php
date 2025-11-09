<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Laporan | Findit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    @include('components.navbar')

    <!-- Container Form -->
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-2xl p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Edit Laporan Barang</h2>

        <form action="{{ route('laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Jenis Laporan -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Jenis Laporan</label>
                <select name="jenis_laporan" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">
                    <option value="Barang Hilang" {{ $laporan->jenis_laporan == 'Barang Hilang' ? 'selected' : '' }}>Barang Hilang</option>
                    <option value="Barang Ditemukan" {{ $laporan->jenis_laporan == 'Barang Ditemukan' ? 'selected' : '' }}>Barang Ditemukan</option>
                </select>
            </div>

            <!-- Nama Barang -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Nama Barang</label>
                <input type="text" name="nama_barang" value="{{ $laporan->nama_barang }}"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Deskripsi Barang</label>
                <textarea name="deskripsi" rows="4"
                          class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>{{ $laporan->deskripsi }}</textarea>
            </div>

            <!-- Lokasi -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Lokasi Kejadian</label>
                <input type="text" name="lokasi" value="{{ $laporan->lokasi }}"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Nomor Telepon -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" value="{{ $laporan->nomor_telepon }}"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Tanggal -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Tanggal Kejadian</label>
                <input type="date" name="tanggal" value="{{ $laporan->tanggal }}"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Upload Foto -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Foto Barang</label>
                <input type="file" name="foto" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">

                @if ($laporan->foto)
                    <p class="text-sm text-gray-600 mt-2">Foto saat ini:</p>
                    <img src="{{ asset('storage/'.$laporan->foto) }}" alt="Foto Barang" class="w-40 h-40 object-cover rounded-lg mt-1">
                @endif
            </div>

            <!-- Tombol Update -->
            <div class="flex justify-center">
                <button type="submit"
                        class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition-all">
                    Perbarui Laporan
                </button>
            </div>
        </form>
    </div>

</body>
</html>
