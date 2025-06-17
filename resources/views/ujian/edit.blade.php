@extends('layouts.app')

@section('content')
<h2>Edit Ujian</h2>

<form action="{{ route('ujian.update', $ujian->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="nama_ujian">Nama Ujian:</label>
        <input type="text" name="nama_ujian" value="{{ $ujian->nama_ujian }}" required>
    </div>

    <div>
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi">{{ $ujian->deskripsi }}</textarea>
    </div>

    <div>
        <label for="materi_id">Materi:</label>
        <select name="materi_id" required>
            @foreach ($materis as $materi)
                <option value="{{ $materi->id }}" {{ $materi->id == $ujian->materi_id ? 'selected' : '' }}>
                    {{ $materi->judul }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="waktu_mulai">Waktu Mulai:</label>
        <input type="datetime-local" name="waktu_mulai" value="{{ $ujian->waktu_mulai }}">
    </div>

    <div>
        <label for="waktu_selesai">Waktu Selesai:</label>
        <input type="datetime-local" name="waktu_selesai" value="{{ $ujian->waktu_selesai }}">
    </div>

    <div>
        <label for="kkm">KKM:</label>
        <input type="number" name="kkm" value="{{ $ujian->kkm }}">
    </div>

    <button type="submit">Update</button>
</form>
@endsection
