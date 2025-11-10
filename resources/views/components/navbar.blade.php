<!-- Navbar -->
<nav class="bg-white shadow-md">
    <div class="max-w-6xl mx-auto px-6 py-3 flex justify-between items-center">
        <!-- Logo -->
        <h1 class="text-2xl font-bold text-blue-600">Findit</h1>

        <!-- Menu -->
        <ul class="flex items-center space-x-8 text-gray-700 font-medium">
            <li>
                <a href="/beranda"
                   class="transition {{ request()->is('beranda') ? 'text-blue-600 font-semibold' : 'hover:text-blue-600' }}">
                   Beranda
                </a>
            </li>
            <li>
                <a href="/riwayat"
                   class="transition {{ request()->is('riwayat') ? 'text-blue-600 font-semibold' : 'hover:text-blue-600' }}">
                   Riwayat
                </a>
            </li>
            <li>
                <a href="/buat-laporan"
                   class="flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-lg transition">
                    <span class="text-lg font-bold">+</span>
                    <span>Buat Laporan</span>
                </a>
            </li>
            <li>
                <a href="/profil"
                   class="transition {{ request()->is('profil') ? 'text-blue-600 font-semibold' : 'hover:text-blue-600' }}">
                   Profil
                </a>
            </li>
        </ul>
    </div>
</nav>
