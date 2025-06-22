@extends('portal.app')

@section('content')

<link rel="stylesheet" href="{{ asset('portal/assets/css/kelas.css')}} ">
<div id="content">
    <div class="container">
        <div class="row mb-3">
            <div class="col-md-12">
                <h3>Bootcamp Ku</h3>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                @if(session()->has('success'))
                    <div class="alert alert-success">{{session()->get('success')}}</div>
                @endif

                @if($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  </div>
                @endif
            </div>
        </div>

        <div class="row">
            @if (sizeof($bootcamps) > 0)
                @foreach ($bootcamps as $i => $bootcamp)
                    <div class="col-md-4">
                        <div class="box-item">
                            <div class="thumb">
                                <img src="{{ asset('upload/thumbnail/'.$bootcamp->thumbnail) }}" alt="thumbnial" style="margin-bottom: 10px;" />
                            </div>
                            <div class="wrap-details">
                                <h5><a href="#">{{ $bootcamp->name }}</a></h5>
                                <div class="user-area">
                                    <div class="user-details">
                                    </div>
                                </div>
                                <a href="#" class="btn-cta-custom btn-block mt-3">Mohon Menunggu</a>
                                
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <p>Bootcamp tidak tersedia</p>
                </div>
            @endif

        </div>
    </div>
</div>


@endsection
