@extends('layouts.app')

@section('content')
<h2 style="margin-bottom: 20px;">Tambah Soal</h2>

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

<form action="{{ route('soals.store') }}" method="POST" style="background: white; padding: 20px; border-radius: 8px;">
    @csrf

    <label for="materi_id">Materi:</label><br>
    <select name="materi_id" required style="width: 100%; padding: 8px;">
        <option value="">-- Pilih Materi --</option>
        @foreach ($materis as $materi)
            <option value="{{ $materi->id }}" {{ old('materi_id') == $materi->id ? 'selected' : '' }}>{{ $materi->judul }}</option>
        @endforeach
    </select><br><br>

    <label for="pertanyaan">Pertanyaan:</label><br>
    <textarea name="pertanyaan" rows="3" required style="width: 100%; padding: 8px;">{{ old('pertanyaan') }}</textarea><br><br>

    <label for="jenis">Jenis:</label><br>
    <select name="jenis" required style="width: 100%; padding: 8px;">
        <option value="essay" {{ old('jenis') == 'essay' ? 'selected' : '' }}>Essay</option>
    </select><br><br>

    <button type="submit" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Simpan</button>
</form>
@endsection
