@extends('layouts.app')

@section('content')
<style>
    .table-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        overflow-x: auto;
    }

    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .user-table th, .user-table td {
        padding: 12px 15px;
        border-bottom: 1px solid #eee;
        text-align: left;
    }

    .user-table th {
        background-color: #f4f4f9;
        font-weight: bold;
    }

    .user-table tr:hover {
        background-color: #f9f9f9;
    }

    .btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        font-size: 14px;
    }

    .btn-add {
        background-color: #4CAF50;
        color: white;
        margin-bottom: 15px;
        display: inline-block;
    }

    .btn-edit {
        background-color: #2196F3;
        color: white;
    }

    .btn-delete {
        background-color: #f44336;
        color: white;
    }

    @media screen and (max-width: 768px) {
        .user-table th, .user-table td {
            font-size: 14px;
            padding: 10px;
        }

        .btn {
            font-size: 13px;
        }
    }
</style>

<h2 style="margin-bottom: 20px;">Manajemen Materi</h2>

<a href="{{ route('materis.create') }}" class="btn btn-add">Tambah Materi</a>

<div class="table-container">
    <table class="table table-striped" class="display" id="myTable">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Guru</th>
                <th>Attachment</th>
                <th style="text-align: center; width: 170px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($materis as $materi)
            <tr>
                <td>{{ $materi->judul }}</td>
                <td>{{ $materi->deskripsi }}</td>
                <td>{{ $materi->guru->name }}</td>
                <td>
                    <a href="{{ asset($materi->attachment) }}" target="_blank">Lihat</a>
                </td>
                <td style="text-align: center;">
                    <a href="{{ route('materis.edit', $materi->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('materis.destroy', $materi->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
          
            @endforelse
        </tbody>
    </table>
</div>
@endsection
