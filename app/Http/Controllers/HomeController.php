<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $query = Laporan::query();

    if ($request->filled('search')) {
        $query->where('nama_barang', 'like', "%{$request->search}%")
              ->orWhere('deskripsi', 'like', "%{$request->search}%");
    }

    if ($request->filled('filter')) {
        $query->where('jenis_laporan', $request->filter);
    }

    $laporan = $query->latest()->get();

    return view('beranda', compact('laporan'));
}

}
