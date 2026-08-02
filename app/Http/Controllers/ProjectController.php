<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Auth::user()->projects()->latest()->get();
        return view('fe.project-detail', compact('projects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'kategori'     => 'nullable|string|max:255',
            'teknologi'    => 'nullable|string|max:255',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['nama_project', 'kategori', 'teknologi', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('projects', 'public');
        }

        Auth::user()->projects()->create($data);

        return redirect()->back()->with('success', 'Proyek berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'kategori'     => 'nullable|string|max:255',
            'teknologi'    => 'nullable|string|max:255',
            'deskripsi'    => 'nullable|string',
            'gambar'       => 'nullable|image|max:2048',
        ]);

        $project = Auth::user()->projects()->findOrFail($id);
        $data = $request->only(['nama_project', 'kategori', 'teknologi', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            if ($project->gambar) {
                Storage::disk('public')->delete($project->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->back()->with('success', 'Proyek berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $project = Auth::user()->projects()->findOrFail($id);

        if ($project->gambar) {
            Storage::disk('public')->delete($project->gambar);
        }

        $project->delete();

        return redirect()->back()->with('success', 'Proyek berhasil dihapus!');
    }
}
