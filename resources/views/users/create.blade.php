@extends('layouts.app')

@section('content')

<h2 style="margin-bottom: 20px;">Tambah User</h2>

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

<form action="{{ route('users.store') }}" method="POST" style="max-width: 100%; background: white; padding: 20px; border-radius: 8px;">
    @csrf
    <label>Nama:</label><br>
    <input type="text" name="name" required style="width: 100%; padding: 8px;"><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required style="width: 100%; padding: 8px;"><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required style="width: 100%; padding: 8px;"><br><br>

    <label>Konfirmasi Password:</label><br>
    <input type="password" name="password_confirmation" required style="width: 100%; padding: 8px;"><br><br>

    <button type="submit" style="background: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px;">Simpan</button>
</form>
@endsection
