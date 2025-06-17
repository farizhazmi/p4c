<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Materi;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\JawabanUjian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UjianSeeder extends Seeder
{
    public function run(): void
    {
        // Buat user guru
        $guru = User::create([
            'name' => 'Pak Guru',
            'email' => 'guru@example.com',
            'password' => Hash::make('password'),
            'role' => 'guru',
        ]);

        // Buat user siswa
        $siswa = User::create([
            'name' => 'Budi Siswa',
            'email' => 'siswa@example.com',
            'password' => Hash::make('admin'),
            'role' => 'siswa',
        ]);

        // Buat 1 materi
        $materi = Materi::create([
            'judul' => 'Matematika Dasar',
            'deskripsi' => 'Operasi dasar matematika',
            'guru_id' => $guru->id,
        ]);

        // Buat 3 soal
        $soals = collect([
            [
                'pertanyaan' => 'Berapakah 2 + 2?',
                'pilihan' => ['A' => '3', 'B' => '4', 'C' => '5', 'D' => '6'],
                'jawaban_benar' => 'B',
            ],
            [
                'pertanyaan' => 'Berapakah 5 - 3?',
                'pilihan' => ['A' => '1', 'B' => '2', 'C' => '3', 'D' => '4'],
                'jawaban_benar' => 'B',
            ],
            [
                'pertanyaan' => 'Berapakah 3 x 3?',
                'pilihan' => ['A' => '6', 'B' => '7', 'C' => '8', 'D' => '9'],
                'jawaban_benar' => 'D',
            ],
        ]);

        $soals->each(function ($data) use ($materi) {
            Soal::create([
                'materi_id' => $materi->id,
                'pertanyaan' => $data['pertanyaan'],
                'pilihan' => json_encode($data['pilihan']),
                'jawaban_benar' => $data['jawaban_benar'],
            ]);
        });

        // Buat ujian
        $ujian = Ujian::create([
            'materi_id' => $materi->id,
            'waktu_mulai' => now(),
            'waktu_selesai' => now()->addMinutes(30),
            'kkm' => null,
        ]);

    }
}