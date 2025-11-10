<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    // Menampilkan semua laporan milik user
    public function index(Request $request)
{
    $query = Laporan::where('user_id', Auth::id());

    // Cek apakah ada filter jenis laporan
    if ($request->has('filter') && $request->filter != '') {
        $query->where('jenis_laporan', $request->filter);
    }
    // Urutkan terbaru
    $laporan = $query->latest()->get();

    return view('riwayat', compact('laporan'));
}


    // Menampilkan form buat laporan baru
    public function create()
    {
        return view('laporan.create'); // ✅ sesuai nama file view
    }

    // Simpan laporan baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_laporan' => 'required|in:Barang Hilang,Barang Ditemukan',
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20', // ✅ tambahkan
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('laporan', 'public');
        }

        $validated['user_id'] = Auth::id();

        Laporan::create($validated);

        return redirect()->route('riwayat')->with('success', 'Laporan berhasil disimpan!');
    }

    // Tampilkan form edit
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
    }

    // Update laporan yang sudah ada
    public function update(Request $request, $id)
    {
        $laporan = Laporan::findOrFail($id);

        // Pastikan user hanya bisa ubah laporannya sendiri
        if ($laporan->user_id != Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'jenis_laporan' => 'required|in:Barang Hilang,Barang Ditemukan',
            'nama_barang' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'lokasi' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Jika ada foto baru, hapus foto lama dan upload baru
        if ($request->hasFile('foto')) {
            if ($laporan->foto) {
                Storage::disk('public')->delete($laporan->foto);
            }
            $validated['foto'] = $request->file('foto')->store('laporan', 'public');
        }

        $laporan->update($validated);

        return redirect()->route('riwayat')->with('success', 'Laporan berhasil diperbarui!');
    }

    // Hapus laporan
    public function destroy($id)
    {
        $laporan = Laporan::findOrFail($id);

        if ($laporan->user_id != Auth::id()) {
            abort(403);
        }

        if ($laporan->foto) {
            Storage::disk('public')->delete($laporan->foto);
        }

        $laporan->delete();

        return back()->with('success', 'Laporan berhasil dihapus.');
    }
}
