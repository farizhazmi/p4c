<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Soal;
use Illuminate\Http\Request;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $soals = Soal::get();
        return view('soals.index', compact('soals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $materis = Materi::all();
        return view('soals.create', compact('materis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'pertanyaan' => 'required|string',
            'jenis' => 'required|in:essay,pilgan',
        ]);

        $data = [
            'materi_id' => $request->materi_id,
            'pertanyaan' => $request->pertanyaan,
            'jenis' => $request->jenis,
        ];
        
        Soal::create($data);

        return redirect()->route('soals.index')->with('success', 'Soal berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Soal $soal)
    {
        $materis = Materi::all();
        return view('soals.edit', compact('soal', 'materis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Soal $soal)
    {
        $request->validate([
            'materi_id' => 'required|exists:materis,id',
            'pertanyaan' => 'required|string',
            'jenis' => 'required|in:essay,pilgan',
        ]);

        $data = [
            'materi_id' => $request->materi_id,
            'pertanyaan' => $request->pertanyaan,
            'jenis' => $request->jenis,
        ];

        $soal->update($data);

        return redirect()->route('soals.index')->with('success', 'Soal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        $soal->delete();
        return redirect()->route('soals.index')->with('success', 'Soal berhasil dihapus.');
    }

}
