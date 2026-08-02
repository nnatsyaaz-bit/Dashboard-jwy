<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KontakController extends Controller
{
    /**
     * Tampilkan data kontak milik user yang login.
     */
    public function index()
    {
        $kontak = Auth::user()->kontaks()->latest()->get();
        return view('kontak.view', compact('kontak'));
    }

    /**
     * Tampilkan form tambah kontak.
     */
    public function create()
    {
        return view('kontak.create');
    }

    /**
     * Simpan data kontak baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'link' => 'required|url|max:255',
            'icon' => 'required|string|max:50'
        ]);

        Auth::user()->kontaks()->create([
            'nama' => $request->nama,
            'link' => $request->link,
            'icon' => $request->icon,
        ]);

        return redirect()->route('kontak.index')->with('success', 'Kontak Berhasil Ditambah!');
    }

    /**
     * Tampilkan form edit kontak.
     */
    public function edit($id)
    {
        $kontak = Auth::user()->kontaks()->findOrFail($id);
        return view('kontak.edit', compact('kontak'));
    }

    /**
     * Perbarui data kontak.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'link' => 'required|url|max:255',
            'icon' => 'required|string|max:50'
        ]);

        $kontak = Auth::user()->kontaks()->findOrFail($id);
        $kontak->update([
            'nama' => $request->nama,
            'link' => $request->link,
            'icon' => $request->icon,
        ]);

        return redirect()->route('kontak.index')->with('success', 'Kontak Berhasil Diperbarui!');
    }

    /**
     * Hapus data kontak.
     */
    public function destroy($id)
    {
        $kontak = Auth::user()->kontaks()->findOrFail($id);
        $kontak->delete();

        return redirect()->route('kontak.index')->with('success', 'Kontak Berhasil Dihapus!');
    }
}
