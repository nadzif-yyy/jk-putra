<?php

namespace App\Http\Controllers;

// Import model Projects agar bisa dikenali oleh Controller
use App\Models\Projects; 
use Illuminate\Http\Request;

// PERBAIKAN: Namespace Facade Dompdf disesuaikan dengan standar library terbaru
use Barryvdh\DomPDF\Facade\Pdf;

class AdminProjectController extends Controller
{
    /**
     * Menampilkan daftar project di halaman admin.
     */
    public function index()
    {
        // Mengambil data project terbaru dari database
        $projects = Projects::latest()->get(); 
        
        // Mengirim data ke view admin/projects/index.blade.php
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imagePath);
        }

        Projects::create([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'teknologi' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $project = Projects::findOrFail($id);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            if ($imagePath && file_exists(public_path('images/' . $imagePath))) {
                unlink(public_path('images/' . $imagePath));
            }
            $imagePath = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $imagePath);
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'teknologi' => $request->teknologi,
            'image' => $imagePath,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);

        if ($project->image && file_exists(public_path('images/' . $project->image))) {
            unlink(public_path('images/' . $project->image));
        }

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully.');
    }

    /**
     * FITUR TAMBAHAN: Cetak PDF untuk Satu Project Spesifik
     */
    public function downloadPDF($id)
    {
        $project = Projects::findOrFail($id);
        $date = date('d M Y');

        // Memuat template view khusus PDF per baris
        $pdf = Pdf::loadView('admin.projects.pdf_single', compact('project', 'date'));
        
        // Atur ukuran kertas dan orientasi
        $pdf->setPaper('a4', 'portrait');

        // Download otomatis dengan nama file dinamis sesuai judul project
        return $pdf->download('Laporan_Project_' . str_replace(' ', '_', $project->title) . '.pdf');
    }

    /**
     * FITUR TAMBAHAN: Cetak PDF Semua Daftar Project (Sesuai kode screenshot yt)
     */
    public function downloadAllPDF()
    {
        $projects = Projects::latest()->get();
        $date = date('d M Y');

        // UPDATE: Diarahkan ke view 'admin.projects.pdf' sesuai nama file pdf.blade.php Anda
        $pdf = Pdf::loadView('admin.projects.pdf', compact('projects', 'date'));
        
        // Atur ukuran kertas ke A4 Portrait agar sesuai dengan susunan tabel vertikal
        $pdf->setPaper('a4', 'portrait'); 

        return $pdf->download('Laporan_Data_Projects.pdf');
    }
}