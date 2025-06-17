@extends('layouts.app')

@section('content')
<h2 style="margin-bottom: 20px;">Edit Materi</h2>

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

<form action="{{ route('materis.update', $materi->id) }}" method="POST" enctype="multipart/form-data" style="max-width: 100%; background: white; padding: 20px; border-radius: 8px;">
    @csrf
    @method('PUT')

    <label>Judul:</label><br>
    <input type="text" name="judul" value="{{ old('judul', $materi->judul) }}" required style="width: 100%; padding: 8px;"><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi" rows="5" style="width: 100%; padding: 8px;">{{ old('deskripsi', $materi->deskripsi) }}</textarea><br><br>

    <label>File Attachment:</label>
    @if ($materi->attachment)
        <div style="margin: 5px 0;">
            <small>File saat ini: <a href="{{ asset($materi->attachment) }}" target="_blank">Lihat</a></small>
        </div>
    @endif
    <input type="file" name="attachment" style="width: 100%; padding: 8px;"><br><br>

    <label>Guru:</label><br>
    <select name="guru_id" required style="width: 100%; padding: 8px;">
        <option value="">-- Pilih Guru --</option>
        @foreach ($gurus as $guru)
            <option value="{{ $guru->id }}" {{ old('guru_id', $materi->guru_id) == $guru->id ? 'selected' : '' }}>{{ $guru->name }}</option>
        @endforeach
    </select><br><br>

    <button type="submit" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Update</button>
</form>
@endsection
