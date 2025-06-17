<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahSoal = \App\Models\Soal::count();
        $jumlahMateri = \App\Models\Materi::count();
        $jumlahGuru = \App\Models\User::where('role', 'guru')->count();
        $jumlahSiswa = \App\Models\User::where('role', 'siswa')->count();

        return view('dashboard', compact('jumlahSoal', 'jumlahMateri', 'jumlahGuru', 'jumlahSiswa'));
    }
}
