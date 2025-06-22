@extends('layouts.app')

@section('content')

<style>
.card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

.card-body {
    padding: 25px;
}

.card h3 {
    font-size: 40px;
    margin-bottom: 10px;
}

.card p {
    font-size: 16px;
    margin: 0;
    letter-spacing: 0.5px;
}

.card-blue {
    background: linear-gradient(135deg, #1e90ff, #3cb6ff);
}

.card-green {
    background: linear-gradient(135deg, #28a745, #60d394);
}

.card-orange {
    background: linear-gradient(135deg, #fd7e14, #ffb677);
}

.card-red {
    background: linear-gradient(135deg, #dc3545, #ff6b6b);
}
</style>
<div class="container mt-5">
    <h2 class="text-center mb-4">📊 Dashboard Ringkasan Data</h2>

    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card shadow-sm border-0 card-blue" onclick="window.location='{{ route('soals.index') }}'">
                <div class="card-body text-center text-white">
                    <h3>{{ $jumlahSoal }}</h3>
                    <p>Jumlah Soal</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card shadow-sm border-0 card-green" onclick="window.location='{{ route('materis.index') }}'">
                <div class="card-body text-center text-white">
                    <h3>{{ $jumlahMateri }}</h3>
                    <p>Jumlah Materi</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card shadow-sm border-0 card-orange" onclick="window.location='{{ route('users.index', ['role' => 'guru']) }}'">
                <div class="card-body text-center text-white">
                    <h3>{{ $jumlahGuru }}</h3>
                    <p>Jumlah Guru</p>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card shadow-sm border-0 card-red" onclick="window.location='{{ route('users.index', ['role' => 'siswa']) }}'">
                <div class="card-body text-center text-white">
                    <h3>{{ $jumlahSiswa }}</h3>
                    <p>Jumlah Siswa</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

