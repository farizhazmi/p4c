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

<h2 style="margin-bottom: 20px;">Manajemen Ujian</h2>

<a href="{{ route('ujian.create') }}" class="btn btn-add">Tambah Ujian</a>


<div class="table-container">
    <table class="table table-striped" class="display" id="myTable">
        <thead>
            <tr>
                <th>Nama Ujian</th>
                <th>Materi</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>KKM</th>
                <th style="text-align: center; width: 170px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ujians as $ujian)
            <tr>
                <td>{{ $ujian->nama_ujian }}</td>
                <td>{{ $ujian->materi->judul }}</td>
                <td>{{ $ujian->waktu_mulai }}</td>
                <td>{{ $ujian->waktu_selesai }}</td>
                <td>{{ $ujian->kkm }}</td>
                <td style="text-align: center;">
                    <a href="{{ route('ujian.edit', $ujian->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('ujian.destroy', $ujian->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus ujian ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>
</div>
@endsection
