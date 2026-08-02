<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Tampilkan halaman biodata/profil milik user yang login.
     */
    public function index()
    {
        $profil = Auth::user()->profile;
        return view('profile.view', compact('profil'));
    }

    /**
     * Simpan/perbarui data biodata milik user yang login (upsert - selalu 1 baris per user).
     */
    public function update(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:100',
            'nim'   => 'required|string|max:50',
            'email' => 'required|email|max:100',
        ]);

        $data = $request->except(['foto', '_token', '_method']);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $data['foto'] = $filename;
        }

        Auth::user()->profile()->updateOrCreate(
            ['user_id' => Auth::id()],
            $data
        );

        return redirect()->route('profile.index')->with('success', 'Biodata berhasil diperbarui!');
    }
}
