@extends('layouts.app')

@section('content')

<h2 style="margin-bottom: 20px;">Tambah Ujian</h2>

{{-- Tampilkan error jika ada --}}
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

<form action="{{ route('ujian.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 100%; background: white; padding: 20px; border-radius: 8px;">
    @csrf

    <label for="nama_ujian">Nama Ujian:</label><br>
    <input type="text" name="nama_ujian" id="nama_ujian" value="{{ old('nama_ujian') }}" required style="width: 100%; padding: 8px;"><br><br>

    <label for="deskripsi">Deskripsi:</label><br>
    <textarea name="deskripsi" id="deskripsi" rows="5" style="width: 100%; padding: 8px;">{{ old('deskripsi') }}</textarea><br><br>

    <label for="materi_id">Materi:</label><br>
    <select name="materi_id" id="materi_id" required style="width: 100%; padding: 8px;">
        <option value="">-- Pilih Materi --</option>
        @foreach ($materis as $materi)
            <option value="{{ $materi->id }}" {{ old('materi_id') == $materi->id ? 'selected' : '' }}>{{ $materi->judul }}</option>
        @endforeach
    </select><br><br>

    <label for="waktu_mulai">Waktu Mulai:</label><br>
    <input type="datetime-local" name="waktu_mulai" id="waktu_mulai" value="{{ old('waktu_mulai') }}" required style="width: 100%; padding: 8px;"><br><br>

    <label for="waktu_selesai">Waktu Selesai:</label><br>
    <input type="datetime-local" name="waktu_selesai" id="waktu_selesai" value="{{ old('waktu_selesai') }}" required style="width: 100%; padding: 8px;"><br><br>

    <label for="kkm">KKM:</label><br>
    <input type="number" name="kkm" id="kkm" value="{{ old('kkm') }}" required style="width: 100%; padding: 8px;"><br><br>

    <button type="submit" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Simpan</button>
    <a href="{{ route('ujian.index') }}" style="margin-left: 10px; padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px;">Batal</a>
</form>

@endsection
