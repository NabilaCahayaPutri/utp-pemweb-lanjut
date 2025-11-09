<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Laporan | Findit</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

   @include('components.navbar')

    <!-- Container Form -->
    <div class="max-w-3xl mx-auto mt-10 bg-white shadow-lg rounded-2xl p-8">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Buat Laporan Barang</h2>

        <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Jenis Laporan -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Jenis Laporan</label>
                <select name="jenis_laporan" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">
                    <option value="" disabled selected>Pilih jenis laporan</option>
                    <option value="Barang Hilang">Barang Hilang</option>
                    <option value="Barang Ditemukan">Barang Ditemukan</option>
                </select>
            </div>

            <!-- Nama Barang -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Nama Barang</label>
                <input type="text" name="nama_barang" placeholder="Contoh: Dompet kulit hitam"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Deskripsi Barang</label>
                <textarea name="deskripsi" rows="4" placeholder="Tuliskan detail barang..."
                          class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required></textarea>
            </div>

            <!-- Lokasi -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Lokasi Kejadian</label>
                <input type="text" name="lokasi" placeholder="Contoh: Mall Central, Lantai 2"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                <input type="text" name="nomor_telepon" placeholder="Contoh: 089752415152"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Tanggal -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Tanggal Kejadian</label>
                <input type="date" name="tanggal"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400" required>
            </div>

            <!-- Upload Foto -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">Foto Barang</label>
                <input type="file" name="foto" accept="image/*"
                       class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-blue-400">
            </div>

            <!-- Tombol Submit -->
            <div class="flex justify-center">
                <button type="submit"
                        class="bg-blue-600 text-white font-semibold px-6 py-3 rounded-lg hover:bg-blue-700 transition-all">
                    Simpan Laporan
                </button>
            </div>
        </form>
    </div>

</body>
</html>
