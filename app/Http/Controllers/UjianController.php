<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use App\Models\Materi;
use App\Models\Soal;
use App\Models\UjianDetail;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        // Ambil semua data ujian dengan relasi materi
        $ujians = Ujian::with('materi')->get();
        return view('ujian.index', compact('ujians'));
    }

    public function create()
    {
        // Ambil semua data materi untuk pilihan dropdown
        $materis = Materi::all();
        return view('ujian.create', compact('materis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'materi_id' => 'required|exists:materis,id',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date',
            'kkm' => 'required|integer',
        ]);

        $ujian = Ujian::create([
            'nama_ujian' => $request->nama_ujian,
            'deskripsi' => $request->deskripsi,
            'materi_id' => $request->materi_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'kkm' => $request->kkm,
        ]);

        $soals = Soal::where('materi_id', '=', $request->materi_id)->get();
        if(sizeof($soals) > 0){
            foreach($soals as $i => $soal){
                UjianDetail::create(
                    [
                        'ujian_id' => $ujian->id,
                        'soal_id' => $soal->id,
                        'pertanyaan' => $soal->pertanyaan 
                    ]
                );
            }
        }
        
        return redirect()->route('ujian.index')->with('success', 'Ujian berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $ujian = Ujian::findOrFail($id);
        $materis = Materi::all();
        return view('ujian.edit', compact('ujian', 'materis'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_ujian' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'materi_id' => 'required|exists:materis,id',
            'waktu_mulai' => 'nullable|date',
            'waktu_selesai' => 'nullable|date',
            'kkm' => 'nullable|integer',
        ]);

        // Cari dan update ujian
        $ujian = Ujian::findOrFail($id);
        $ujian->update($request->all());

        return redirect()->route('ujian.index')->with('success', 'Ujian berhasil diperbarui');
    }

    public function destroy($id)
    {
        // Hapus ujian
        Ujian::destroy($id);
        return redirect()->route('ujian.index')->with('success', 'Ujian berhasil dihapus');
    }
}
