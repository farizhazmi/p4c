<?php

namespace App\Http\Controllers;

use App\Models\HasilUjian;
use App\Models\HasilUjianDetail;
use App\Models\Materi;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\UjianDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Smalot\PdfParser\Parser;
use Illuminate\Support\Facades\Http;

class PortalController extends Controller
{
    public function index(){
        $menu = 'dashboard';
        return view('portal.dashboard', compact('menu'));
    }

    public function exam(){
        $menu = 'exam';
        $ujians = Ujian::get();
        return view('portal.exam', compact('menu', 'ujians'));
    }

    public function start($ujian_id){
        $menu = 'start';
        $ujian = Ujian::where('id', $ujian_id)->first();
        $ujianDetails = UjianDetail::where('ujian_id', $ujian_id)->get();
        return view('portal.start', compact('menu', 'ujian', 'ujianDetails'));
    }

    public function examSubmit(Request $request, $ujian_id){
        $parser = new Parser();

        $ujian = Ujian::where('id', $ujian_id)->first();
        $materi = Materi::where('id', $ujian->materi_id)->first();
        $filePath = public_path($materi->attachment); 

        $pdf = $parser->parseFile($filePath);
        $text = $pdf->getText();
        $totalNilai = 0;

        $hasilUjian = HasilUjian::create([
            'ujian_id' => $ujian_id,
            'user_id' => Auth::user()->id,
            'materi_id' => $ujian->materi_id,
            'total_nilai' => $totalNilai
        ]);

        foreach($request->soal as $i => $soal){

            $soal = $request->soal[$i];
            $jawaban = $request->jawaban[$i];
            
            $prompt = 'Materi : \n '.$text.' \n\n soal: \n '.$soal.'. \n\n jawaban: \n '.$jawaban.'. \n\n Output nya buat dalam bentuk json dengan format: Nilai: [nilai dari 0 sampai 100 dengan akurasi soal, jawaban berdasarkan materi] \n alasan: [alasan] \n\n . contoh output json seperti dibawah ini:\n 
                    {
                    "Nilai": 70,
                    "alasan": "Jawaban menyebutkan tanggal pembentukan BPUPKI dan tujuan pembentukannya oleh Jepang sebagai pemenuhan janji kemerdekaan. Namun, kurang detail dalam menjelaskan proses pembentukan secara lengkap dan peran penting BPUPKI dalam perumusan dasar negara. Seharusnya, jawaban mencakup:\n\n- Proses Pembentukan: Menjelaskan konteks pendudukan Jepang, situasi Perang Pasifik, dan pertimbangan politik Jepang dalam membentuk BPUPKI. Selain itu, menyebutkan tokoh-tokoh yang terlibat dalam pembentukan BPUPKI dari pihak Indonesia.\n\n- Peran Penting dalam Perumusan Dasar Negara: Menjelaskan secara rinci peran BPUPKI dalam mengadakan sidang-sidang untuk membahas dasar negara, terbentuknya Panitia Sembilan, dan menghasilkan Piagam Jakarta. Kurang detail dalam menjelaskan kontribusi tokoh-tokoh seperti Soekarno, Moh. Hatta, dan tokoh lainnya dalam perumusan Pancasila."
                    }
                    \n\n
                    Pastikan hasil output langsung dalam format JSON dan tidak menggunakan block ```json atau ```';
            $response = Http::post(
                'https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=' . env('GEMINI_API_KEY'),
                [
                    'contents' => [
                        [
                            'parts' => [
                                ['text' => $prompt]
                            ]
                        ]
                    ]
                ]
            );

            // Ambil hasil response seperti ini
            $resultText = $response['candidates'][0]['content']['parts'][0]['text'] ?? null;
            $cleaned = preg_replace('/```json|```/', '', $resultText); // hilangkan tanda backtick
            $cleaned = trim($cleaned); // hilangkan spasi/enter
            $data = json_decode($cleaned, true);
            
            $nilai = $data['Nilai'];
            $alasan = $data['alasan'];

            $hasilUjianDetail = HasilUjianDetail::create([
                'hasil_ujian_id' => $hasilUjian->id,
                'pertanyaan' => $soal,
                'jawaban' => $jawaban,
                'nilai' => $nilai,
                'alasan' => $alasan
            ]);

            $totalNilai += $nilai;
            
        }

        $hasilUjian->update([
            'total_nilai' => $totalNilai
        ]);

        
        return redirect()->route('portal.exam')->with('success', 'Ujian Berhasil');
    }
    
    public function showLoginForm()
    {
        return view('portal.login');
    }

    public function doLogin(Request $request){
        
        $credentials = $request->only('email', 'password');

        // Cek login
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/portal/exam');
        }

        // Jika gagal
        return back()->with('error', 'Email atau password salah.');
    }
}
