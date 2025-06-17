@extends('layouts.app')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Soal</h2>

@if ($errors->any())
    <div style="background-color: #f8d7da; color: #842029; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
        <strong>Terjadi kesalahan:</strong>
        <ul style="margin: 10px 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('soals.update', $soal->id) }}" method="POST" style="background: white; padding: 20px; border-radius: 8px;">
    @csrf
    @method('PUT')

    <label for="materi_id">Materi:</label><br>
    <select name="materi_id" required style="width: 100%; padding: 8px;">
        <option value="">-- Pilih Materi --</option>
        @foreach ($materis as $materi)
            <option value="{{ $materi->id }}" {{ $soal->materi_id == $materi->id ? 'selected' : '' }}>{{ $materi->judul }}</option>
        @endforeach
    </select><br><br>

    <label for="pertanyaan">Pertanyaan:</label><br>
    <textarea name="pertanyaan" rows="3" required style="width: 100%; padding: 8px;">{{ old('pertanyaan', $soal->pertanyaan) }}</textarea><br><br>

    <label for="jenis">Jenis:</label><br>
    <select name="jenis" id="jenis" required style="width: 100%; padding: 8px;" onchange="togglePilihan(this.value)">
        <option value="essay" {{ $soal->jenis == 'essay' ? 'selected' : '' }}>Essay</option>
        <option value="pilgan" {{ $soal->jenis == 'pilgan' ? 'selected' : '' }}>Pilihan Ganda</option>
    </select><br><br>

    <div id="pilihan_ganda_section" style="{{ $soal->jenis == 'pilgan' ? '' : 'display:none;' }}">
        <label>Pilihan Jawaban:</label><br>
        @php
            $pilihan = $soal->pilihan ?? ['a'=>'', 'b'=>'', 'c'=>'', 'd'=>''];
        @endphp
        <input type="text" name="pilihan[a]" placeholder="Pilihan A" value="{{ $pilihan['a'] ?? '' }}" style="width: 100%; padding: 8px;"><br><br>
        <input type="text" name="pilihan[b]" placeholder="Pilihan B" value="{{ $pilihan['b'] ?? '' }}" style="width: 100%; padding: 8px;"><br><br>
        <input type="text" name="pilihan[c]" placeholder="Pilihan C" value="{{ $pilihan['c'] ?? '' }}" style="width: 100%; padding: 8px;"><br><br>
        <input type="text" name="pilihan[d]" placeholder="Pilihan D" value="{{ $pilihan['d'] ?? '' }}" style="width: 100%; padding: 8px;"><br><br>

        <label>Jawaban Benar:</label><br>
        <select name="jawaban_benar" style="width: 100%; padding: 8px;">
            <option value="a" {{ $soal->jawaban_benar == 'a' ? 'selected' : '' }}>A</option>
            <option value="b" {{ $soal->jawaban_benar == 'b' ? 'selected' : '' }}>B</option>
            <option value="c" {{ $soal->jawaban_benar == 'c' ? 'selected' : '' }}>C</option>
            <option value="d" {{ $soal->jawaban_benar == 'd' ? 'selected' : '' }}>D</option>
        </select><br><br>
    </div>

    <button type="submit" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Update</button>
</form>

<script>
    function togglePilihan(value) {
        document.getElementById('pilihan_ganda_section').style.display = (value === 'pilgan') ? '' : 'none';
    }
</script>
@endsection
