<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    // 🔹 Tampilkan halaman setting profil
    public function index()
    {
        $user = Auth::user();
        return view('setting', compact('user'));
    }

    // 🔹 Update profil (nama, email, foto)
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // jika upload foto baru
        if ($request->hasFile('photo')) {
            if ($user->photo && Storage::exists('public/photos/' . $user->photo)) {
                Storage::delete('public/photos/' . $user->photo);
            }

            $filename = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('public/photos', $filename);
            $user->photo = $filename;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    // 🔹 Ganti password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Password lama salah.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diubah.');
    }

    // 🔹 Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
