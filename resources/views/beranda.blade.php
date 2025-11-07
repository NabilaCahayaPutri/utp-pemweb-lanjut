<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Findit - Beranda</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    function openModal(id) {
      document.getElementById('modal-' + id).classList.remove('hidden');
    }
    function closeModal(id) {
      document.getElementById('modal-' + id).classList.add('hidden');
    }
  </script>
</head>

<body class="bg-gray-50 font-sans">
  @include('components.navbar')

  <main class="container mx-auto px-6 py-8">

    <section class="text-center mb-6">
      <h2 class="text-2xl font-semibold text-gray-800 mb-1">Temukan Barang Hilangmu</h2>
      <p class="text-gray-500 mb-4">Cari berdasarkan nama atau jenis laporan</p>

      <form method="GET" action="{{ route('beranda') }}" class="flex justify-center items-center space-x-2">
        <input 
          type="text" 
          name="search" 
          value="{{ request('search') }}" 
          placeholder="Cari barang..." 
          class="w-1/3 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-200">
        
        <select name="filter" class="px-3 py-2 border rounded-lg">
          <option value="">Semua</option>
          <option value="Barang Hilang" {{ request('filter')=='Barang Hilang'?'selected':'' }}>Barang Hilang</option>
          <option value="Barang Ditemukan" {{ request('filter')=='Barang Ditemukan'?'selected':'' }}>Barang Ditemukan</option>
        </select>

        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">Cari</button>
      </form>
    </section>

    <section class="h-[450px] overflow-y-auto px-2">
      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($laporan as $item)

          <div onclick="openModal({{ $item->id }})" 
               class="bg-white p-4 rounded-xl shadow hover:shadow-lg transition cursor-pointer">
            <img src="{{ asset('storage/'.$item->foto) }}" 
                 alt="{{ $item->nama_barang }}" 
                 class="rounded-lg mb-3 w-full h-40 object-cover">

            <h3 class="font-semibold text-lg text-gray-800 truncate">{{ $item->nama_barang }}</h3>
<p class="text-gray-600 text-sm mt-1 line-clamp-2">{{ $item->deskripsi }}</p>
            <div class="mt-2 space-y-1 text-sm">
              <p><strong>📅 Tanggal:</strong> {{ $item->tanggal }}</p>
              <span class="text-sm font-semibold 
                {{ $item->jenis_laporan == 'Barang Hilang' ? 'text-red-500' : 'text-green-500' }}">
                {{ $item->jenis_laporan }}
              </span>
            </div>
          </div>


          <div id="modal-{{ $item->id }}" 
               class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
            <div class="bg-white rounded-2xl shadow-xl max-w-lg w-full p-6 relative">
              <button onclick="closeModal({{ $item->id }})" 
                      class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-xl">&times;</button>

              <img src="{{ asset('storage/'.$item->foto) }}" 
                   alt="{{ $item->nama_barang }}" 
                   class="rounded-lg mb-4 w-full h-60 object-cover">

              <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $item->nama_barang }}</h2>
              <p class="text-gray-600 mb-3">{{ $item->deskripsi }}</p>

              <div class="space-y-1 text-gray-700">
                <p><strong>📞 Nomor Telepon:</strong> {{ $item->nomor_telepon }}</p>
                <p><strong>📍 Lokasi:</strong> {{ $item->lokasi }}</p>
                <p><strong>📅 Tanggal:</strong> {{ $item->tanggal }}</p>
              </div>

              <div class="mt-4">
                <span class="text-sm font-semibold 
                  {{ $item->jenis_laporan == 'Barang Hilang' ? 'text-red-600' : 'text-green-600' }}">
                  {{ $item->jenis_laporan }}
                </span>
              </div>
            </div>
          </div>
        @empty
          <p class="text-gray-500 col-span-3 text-center py-8">Belum ada laporan yang ditemukan.</p>
        @endforelse
      </div>
    </section>
  </main>

</body>
</html>
