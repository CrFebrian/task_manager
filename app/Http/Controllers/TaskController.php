<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $tasks = Task::take(10)->get();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    // Menampilkan form pembuatan tugas
    public function create()
    {
        return view('tasks.create'); // Tampilkan form untuk membuat tugas baru
    }

    // Menyimpan tugas baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable',
            'status' => 'nullable',
        ]);

        // Simpan tugas ke database
        Task::create($validated);

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dibuat');
    }

    // Menampilkan detail tugas berdasarkan ID
    public function show($id)
    {
        $tasks = Task::findOrFail($id); // Cari tugas berdasarkan ID
        return view('tasks.show', compact('tasks')); // Tampilkan detail tugas
    }

    // Menampilkan form edit tugas
    public function edit($id)
    {
        $tasks = Task::findOrFail($id); // Cari tugas berdasarkan ID
        return view('tasks.edit', compact('tasks')); // Tampilkan form edit tugas
    }

    // Memperbarui tugas
    public function update(Request $request, $id)
    {
        $tasks = Task::findOrFail($id); // Cari tugas berdasarkan ID

        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable',
        ]);

        // Update tugas di database
        $tasks->update($validated);

        return redirect()->route('tasks.show', $tasks->id)->with('success', 'Tugas berhasil diperbarui');
    }

    // Menghapus tugas
    public function destroy($id)
    {
        $tasks = Task::findOrFail($id); // Cari tugas berdasarkan ID
        $tasks->delete(); // Hapus tugas

        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus');
    }
}
