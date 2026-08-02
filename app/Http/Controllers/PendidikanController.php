<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PendidikanController extends Controller
{
    public function index()
    {
        $pendidikans = Auth::user()->pendidikans()->latest()->get();
        return view('fe.pendidikan-detail', compact('pendidikans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'tingkat'       => 'required|string|max:255',
            'tahun'         => 'required|string|max:255',
        ]);

        Auth::user()->pendidikans()->create($request->only([
            'nama_instansi', 'tingkat', 'tahun', 'deskripsi', 'fokus_pembelajaran',
        ]));

        return redirect()->back()->with('success', 'Data pendidikan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_instansi' => 'required|string|max:255',
            'tingkat'       => 'required|string|max:255',
            'tahun'         => 'required|string|max:255',
        ]);

        $pendidikan = Auth::user()->pendidikans()->findOrFail($id);
        $pendidikan->update($request->only([
            'nama_instansi', 'tingkat', 'tahun', 'deskripsi', 'fokus_pembelajaran',
        ]));

        return redirect()->back()->with('success', 'Data pendidikan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pendidikan = Auth::user()->pendidikans()->findOrFail($id);
        $pendidikan->delete();

        return redirect()->back()->with('success', 'Data pendidikan berhasil dihapus!');
    }
}
