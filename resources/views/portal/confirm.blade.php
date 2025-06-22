@extends('portal.app')

@section('content')
<style>
    .wrapper-payment {
        display: flex;
        padding: 20px 0 40px 0;
    }
    .wrapper-payment .payment-method-item {
        align-self: baseline;
        padding-right: 35px;
    }
    .payment-method-item img {
        margin-bottom: 5px;
    }
</style>
<link rel="stylesheet" href="{{ asset('portal/assets/css/payment.css') }}">
<div id="content">
    <div class="container">
        <div class="row mb-3">
            <div class="col-lg-12">
                <h3>Konfirmasi Pembayaran</h3>
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

        @php
            $class = '';
            $txt = '';
            if ($transaction->status == 'Paid'){
                $txt = 'Lunas';
                $class = 'status paid';
            }
            else if ($transaction->status == 'Pending'){
                $txt = 'Menunggu Pembayaran';
                $class = 'status pending';
            }
            else{
                $txt = 'Dibatalkan';
                $class = 'status cancel';
            }
        @endphp

        <div class="row">
            <div class="col-lg-12">
                <div class="box-confirm">
                    <table class="table">
                        <tr>
                            <td>Tanggal Transaksi</td>
                            <td style="width: 10px;">:</td>
                            <td>{{ date('d-F-Y H:i:s', strtotime($transaction->created_at)) }}</td>
                        </tr>
                        <tr>
                            <td>No. Invoice</td>
                            <td style="width: 10px;">:</td>
                            <td><strong>{{ $transaction->invoice_no }}</strong></td>
                        </tr>
                        <tr>
                            <td>Kelas</td>
                            <td style="width: 10px;">:</td>
                            <td>
                                @if (sizeof($courses) > 0)
                                    @foreach ($courses as $i => $course)
                                        <div>{{ $course->name }} (Rp{{ number_format($course->price) }})</div>
                                    @endforeach

                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Subtotal</td>
                            <td style="width: 10px;">:</td>
                            <td><strong>Rp{{ number_format($transaction->subtotal) }}</strong></td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td style="width: 10px;">:</td>
                            <td><strong>Rp{{ number_format($transaction->discount) }}(-)</strong></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td style="width: 10px;">:</td>
                            <td><strong>Rp{{ number_format($transaction->total) }}</strong></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td style="width: 10px;">:</td>
                            <td><span class="{{ $class }}" style="font-weight: bold">{{ $transaction->status == 'Paid' ? 'Lunas' : $transaction->status }}</span> </td>
                        </tr>
                        <tr>
                            <td>Bukti Pembayaran</td>
                            <td style="width: 10px;">:</td>
                            @if (!empty($transaction->proof))
                                <td><a target="_blank" href="{{ asset('upload/proof/'.$transaction->proof) }}">Click to view</a></td>
                            @else
                                <td>-</td>
                            @endif

                        </tr>
                    </table>

                    <h5>Transfer ke:</h5>
                    <div class="wrapper-payment">

                        <div class="payment-method-item">
                            <img style="width: 150px;" src="{{ asset('assets/images/bca.png') }}" alt="mandiri">
                            <div class="no-rek">5440191926</div>
                            <div class="nama">Fariz Hazmi</div>
                        </div>
                    </div>

                    <form action="{{ route('my.confirm-payment', $transaction->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        @if ($transaction->status != 'Paid')
                            <div class="form-group mb-4">
                                <label for="">Upload Bukti Pembayaran</label>
                                <input type="file" class="form-control" name="proof" required />
                            </div>
                        @endif

                        <div class="form-group">
                            @if ($transaction->status != 'Paid')
                                <button type="submit" class="btn-cta-custom">Upload</button>
                            @endif

                            <a href="{{ route('my.payment') }}" class="btn-cta-danger" >Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
