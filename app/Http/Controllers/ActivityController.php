<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Auth::user()->activities()->latest()->get();
        return view('fe.activity', compact('activities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['judul', 'kategori', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('activities', 'public');
        }

        Auth::user()->activities()->create($data);

        return redirect()->back()->with('success', 'Aktivitas berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'     => 'required|string|max:255',
            'kategori'  => 'nullable|string|max:255',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|max:2048',
        ]);

        $activity = Auth::user()->activities()->findOrFail($id);
        $data = $request->only(['judul', 'kategori', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($activity->gambar) {
                Storage::disk('public')->delete($activity->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('activities', 'public');
        }

        $activity->update($data);

        return redirect()->back()->with('success', 'Aktivitas berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $activity = Auth::user()->activities()->findOrFail($id);

        if ($activity->gambar) {
            Storage::disk('public')->delete($activity->gambar);
        }

        $activity->delete();

        return redirect()->back()->with('success', 'Aktivitas berhasil dihapus!');
    }
}
