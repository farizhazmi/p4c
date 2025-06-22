<?php
namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\User;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index()
    {
        $materis = Materi::with('guru')->get();
        return view('materis.index', compact('materis'));
    }

    public function create()
    {
        $gurus = User::where('role', 'guru')->get();
        return view('materis.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf|max:5048',
            'guru_id' => 'required|exists:users,id',
        ]);

        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('materi');
            $file->move($destination, $filename);
            $attachmentPath = 'materi/' . $filename;
        }

        // Simpan ke database
        Materi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'attachment' => $attachmentPath,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('materis.index')->with('success', 'Materi berhasil disimpan.');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        $gurus = User::where('role', 'guru')->get();

        return view('materis.edit', compact('materi', 'gurus'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,jpg,jpeg,png|max:5048',
            'guru_id' => 'required|exists:users,id',
        ]);

        $materi = Materi::findOrFail($id);
        $attachmentPath = $materi->attachment;

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filename = time() . '_' . \Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $destination = public_path('materi');
            $file->move($destination, $filename);
            $attachmentPath = 'materi/' . $filename;
        }

        $materi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'attachment' => $attachmentPath,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('materis.index')->with('success', 'Materi berhasil diperbarui.');
    }


    public function destroy(Materi $materi)
    {
        $materi->delete();
        return redirect()->route('materis.index')->with('success', 'Materi berhasil dihapus.');
    }
}
