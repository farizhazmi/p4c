
@extends('portal.app')

@section('content')
<link rel="stylesheet" href="{{ asset('portal/assets/css/payment.css') }}">
<div id="content">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h3>List Pembayaran</h3>
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
            @if (sizeof($payments) > 0)
                @foreach ($payments as $i => $payment)
                    <div class="col-lg-12">
                        <div class="payment-box">
                            <span class="date">{{ date('d-M-Y H:i:s', strtotime($payment->created_at)) }}</span>
                            @php
                                $class = '';
                                $txt = '';
                                if ($payment->status == 'Paid'){
                                    $txt = 'Lunas';
                                    $class = 'status paid';
                                }
                                else if ($payment->status == 'Pending'){
                                    $txt = 'Menunggu Pembayaran';
                                    $class = 'status pending';
                                }
                                else{
                                    $txt = 'Dibatalkan';
                                    $class = 'status cancel';
                                }
                            @endphp
                            <span class="{{ $class }}">
                                {{ $txt }}
                            </span>
                            <h5><a href="{{ route('my.confirm-payment', $payment->id) }}">No Invoice : {{ $payment->invoice_no }} <i>(Click to detail)</i></i></a></h5>
                            <div class="price">TOTAL : &nbsp;Rp{{ number_format($payment->total) }}</div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-md-12">
                    <p>Pembayaran tidak tersedia</p>
                </div>
            @endif

        </div>
    </div>
</div>

@endsection
