@extends('layouts.app')

@section('content')

<h2 style="margin-bottom: 20px;">Tambah Materi</h2>

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

<form action="{{ route('materis.store') }}" method="POST" enctype="multipart/form-data" style="max-width: 100%; background: white; padding: 20px; border-radius: 8px;">
    @csrf

    <label for="judul">Judul:</label><br>
    <input type="text" name="judul" id="judul" value="{{ old('judul') }}" required style="width: 100%; padding: 8px;"><br><br>

    <label for="deskripsi">Deskripsi:</label><br>
    <textarea name="deskripsi" id="deskripsi" rows="5" style="width: 100%; padding: 8px;">{{ old('deskripsi') }}</textarea><br><br>

    <label for="attachment">File Attachment:</label><br>
    <input type="file" name="attachment" id="attachment" style="width: 100%; padding: 8px;"><br><br>

    <label for="guru_id">Guru:</label><br>
    <select name="guru_id" id="guru_id" required style="width: 100%; padding: 8px;">
        <option value="">-- Pilih Guru --</option>
        @foreach ($gurus as $guru)
            <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>{{ $guru->name }}</option>
        @endforeach
    </select><br><br>

    <button type="submit" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Simpan</button>
    <a href="{{ route('materis.index') }}" style="margin-left: 10px; padding: 10px 20px; background: #6c757d; color: white; text-decoration: none; border-radius: 5px;">Batal</a>
</form>

@endsection
