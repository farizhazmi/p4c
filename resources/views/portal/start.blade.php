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
<div class="container">
    <!--
    <iframe src="http://localhost:8000/materi/1750193056.pdf" width="100%" height="400px">
    </iframe>
-->
    <br>
    <br>

    <form action="{{ route('portal.start.submit', ['ujian_id' => $ujian->id]) }}" method="POST">
        @csrf <!-- Tambahkan proteksi CSRF -->

        @if(count($ujianDetails) > 0)
            @foreach ($ujianDetails as $i => $detail)
                <div class="row"> 
                    <div class="col-md-12">
                        <div class="box-soal">
                            <div class="soal-title">{{ $i + 1 }}. {{ $detail->pertanyaan }}</div>
                            <input type="hidden" name="soal[{{ $detail->soal_id }}]" value="{{ $detail->pertanyaan }}" />
                            <textarea 
                                style="width: 100%" 
                                name="jawaban[{{ $detail->soal_id }}]" 
                                cols="30" 
                                rows="3"
                                required
                            ></textarea>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <div style="font-style: italic; color: red;">Nilai: 60</div>
                            <div style="font-style: italic; color: red;">
                                Jawaban siswa baru menjelaskan sebagian proses pembentukan BPUPKI yaitu dibentuk oleh Jepang sebagai janji kemerdekaan. Belum menjelaskan secara detail mengenai latar belakang dibentuknya (misalnya, situasi Perang Pasifik yang mendesak Jepang untuk mencari dukungan dari bangsa Indonesia) dan belum menjelaskan peran penting BPUPKI dalam perumusan dasar negara Indonesia (misalnya, Sidang Pertama BPUPKI, Piagam Jakarta, Sidang Kedua BPUPKI, dll). Jawaban masih sangat dasar dan kurang detail.
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        <br><br>
    </form>

    
    
</div>

@endsection

