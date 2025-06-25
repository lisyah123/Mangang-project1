<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Penting untuk mengelola file

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        return view('projects.index', compact('projects'));
    }

    // Method baru untuk menampilkan form tambah
    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'project_leader_name' => 'required|string|max:255',
            'project_leader_email' => 'required|email|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'progress' => 'required|integer|min:0|max:100',
            // Validasi untuk file gambar
            'project_leader_avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('project_leader_avatar');
        $data['project_leader_avatar'] = null;

        if ($request->hasFile('project_leader_avatar')) {
            $file = $request->file('project_leader_avatar');
            // Simpan file ke storage/app/public/avatars
            $path = $file->store('avatars', 'public');
            $data['project_leader_avatar'] = $path;
        }

        Project::create($data);

        return redirect()->route('projects.index')
                         ->with('success', 'Project berhasil ditambahkan.');
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required|string|max:255',
            'client' => 'required|string|max:255',
            'project_leader_name' => 'required|string|max:255',
            'project_leader_email' => 'required|email|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'progress' => 'required|integer|min:0|max:100',
            'project_leader_avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('project_leader_avatar');

        if ($request->hasFile('project_leader_avatar')) {
            // 1. Hapus avatar lama jika ada
            if ($project->project_leader_avatar) {
                Storage::disk('public')->delete($project->project_leader_avatar);
            }

            // 2. Upload avatar baru
            $file = $request->file('project_leader_avatar');
            $path = $file->store('avatars', 'public');
            $data['project_leader_avatar'] = $path;
        }

        $project->update($data);

        return redirect()->route('projects.index')
                         ->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        // Hapus file avatar dari storage sebelum menghapus record dari DB
        if ($project->project_leader_avatar) {
            Storage::disk('public')->delete($project->project_leader_avatar);
        }

        $project->delete();

        return redirect()->route('projects.index')
                         ->with('success', 'Project berhasil dihapus.');
    }
}