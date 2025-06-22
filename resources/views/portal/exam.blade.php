@extends('portal.app')

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
    <h2 class="text-center mb-4">📊 Daftar Ujian</h2>
    <br>

    <div class="row">
        @if(count($ujians) > 0)
            @foreach ($ujians as $i => $row)
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                    <div class="card shadow-sm border-0 card-blue">
                        <div class="card-body text-center text-white">
                            <h4><a style="color: #fff" href="{{ route('portal.start', ['ujian_id' => $row->id]) }}">{{ $row->nama_ujian }}</a></h4>
                            <p>Jumlah Soal</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif


    </div>
</div>

@endsection

