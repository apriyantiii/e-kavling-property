@extends('user.profile.layouts.master')
@section('title')
    Rincian Pembelian
@endsection
@section('css')
    <link href="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/choices.js/choices.js.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/datatables.net-bs4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            margin-top: 20px;
            background: #eee;
        }

        .timeline-centered {
            position: relative;
            margin-bottom: 30px;
        }

        .timeline-centered.timeline-sm .timeline-entry {
            margin-bottom: 20px !important;
        }

        .timeline-centered.timeline-sm .timeline-entry .timeline-entry-inner .timeline-label {
            padding: 1em;
        }

        .timeline-centered:before,
        .timeline-centered:after {
            content: " ";
            display: table;
        }

        .timeline-centered:after {
            clear: both;
        }

        .timeline-centered:before {
            content: '';
            position: absolute;
            display: block;
            width: 7px;
            background: #ffffff;
            left: 50%;
            top: 20px;
            bottom: 20px;
            margin-left: -4px;
        }

        .timeline-centered .timeline-entry {
            position: relative;
            width: 50%;
            float: right;
            margin-bottom: 70px;
            clear: both;
        }

        .timeline-centered .timeline-entry:before,
        .timeline-centered .timeline-entry:after {
            content: " ";
            display: table;
        }

        .timeline-centered .timeline-entry:after {
            clear: both;
        }

        .timeline-centered .timeline-entry.begin {
            margin-bottom: 0;
        }

        .timeline-centered .timeline-entry.left-aligned {
            float: left;
        }

        .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner {
            margin-left: 0;
            margin-right: -28px;
        }

        .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-time {
            left: auto;
            right: -115px;
            text-align: left;
        }

        .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-icon {
            float: right;
        }

        .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-label {
            margin-left: 0;
            margin-right: 85px;
        }

        .timeline-centered .timeline-entry.left-aligned .timeline-entry-inner .timeline-label:after {
            left: auto;
            right: 0;
            margin-left: 0;
            margin-right: -9px;
            -moz-transform: rotate(180deg);
            -o-transform: rotate(180deg);
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg);
        }

        .timeline-centered .timeline-entry .timeline-entry-inner {
            position: relative;
            margin-left: -31px;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner:before,
        .timeline-centered .timeline-entry .timeline-entry-inner:after {
            content: " ";
            display: table;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner:after {
            clear: both;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time {
            position: absolute;
            left: -115px;
            text-align: right;
            padding: 10px;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span {
            display: block;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span:first-child {
            font-size: 18px;
            font-weight: bold;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-time>span:last-child {
            font-size: 12px;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon {
            background: #fff;
            color: #999999;
            display: block;
            width: 60px;
            height: 60px;
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding-box;
            background-clip: padding-box;
            border-radius: 50%;
            text-align: center;
            border: 7px solid #ffffff;
            line-height: 45px;
            font-size: 15px;
            float: left;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-primary {
            background-color: #dc6767;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-success {
            background-color: #5cb85c;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-info {
            background-color: #5bc0de;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-warning {
            background-color: #f0ad4e;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-danger {
            background-color: #d9534f;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-red {
            background-color: #bf4346;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-green {
            background-color: #488c6c;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-blue {
            background-color: #0a819c;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-yellow {
            background-color: #f2994b;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-orange {
            background-color: #e9662c;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-pink {
            background-color: #bf3773;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-violet {
            background-color: #9351ad;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-grey {
            background-color: #4b5d67;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-icon.bg-dark {
            background-color: #594857;
            color: #fff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label {
            position: relative;
            background: #ffffff;
            padding: 1.7em;
            margin-left: 85px;
            -webkit-background-clip: padding-box;
            -moz-background-clip: padding;
            background-clip: padding-box;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-red {
            background: #bf4346;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-red:after {
            border-color: transparent #bf4346 transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-red .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-red p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-green {
            background: #488c6c;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-green:after {
            border-color: transparent #488c6c transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-green .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-green p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-orange {
            background: #e9662c;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-orange:after {
            border-color: transparent #e9662c transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-orange .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-orange p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-yellow {
            background: #f2994b;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-yellow:after {
            border-color: transparent #f2994b transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-yellow .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-yellow p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-blue {
            background: #0a819c;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-blue:after {
            border-color: transparent #0a819c transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-blue .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-blue p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-pink {
            background: #bf3773;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-pink:after {
            border-color: transparent #bf3773 transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-pink .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-pink p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-violet {
            background: #9351ad;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-violet:after {
            border-color: transparent #9351ad transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-violet .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-violet p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-grey {
            background: #4b5d67;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-grey:after {
            border-color: transparent #4b5d67 transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-grey .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-grey p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-dark {
            background: #594857;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-dark:after {
            border-color: transparent #594857 transparent transparent;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-dark .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label.bg-dark p {
            color: #ffffff;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label:after {
            content: '';
            display: block;
            position: absolute;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 9px 9px 9px 0;
            border-color: transparent #ffffff transparent transparent;
            left: 0;
            top: 20px;
            margin-left: -9px;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label .timeline-title,
        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p {
            color: #999999;
            margin: 0;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p+p {
            margin-top: 15px;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label .timeline-title {
            margin-bottom: 10px;
            font-family: 'Oswald';
            font-weight: bold;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label .timeline-title span {
            -webkit-opacity: .6;
            -moz-opacity: .6;
            opacity: .6;
            -ms-filter: alpha(opacity=60);
            filter: alpha(opacity=60);
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p .timeline-img {
            margin: 5px 10px 0 0;
        }

        .timeline-centered .timeline-entry .timeline-entry-inner .timeline-label p .timeline-img.pull-right {
            margin: 5px 0 0 10px;
        }
    </style>
@endsection
@include('layouts.head-css')
@section('content')
    <br><br>

    <div class="row">
        <div class="col-lg-12" style="width: 80%; margin: auto;">
            <div class="card">
                <div class="card-body mx-4">
                    <form class="outer-repeater mt-2" method="post">
                        <div data-repeater-list="outer-group" class="outer">
                            <div class="row my-4">
                                <div class="container bootstrap snippets bootdeys">
                                    <div class="col-lg-12">
                                        <div class="timeline-centered timeline-sm">
                                            <h4 class="text-center mb-4">History Pembayaran</h4>
                                            <article class="timeline-entry">
                                                <div class="timeline-entry-inner">
                                                    <time datetime="{{ $payments->payment_date }}"
                                                        class="timeline-time"><span>{{ $payments->payment_date? \Carbon\Carbon::parse($payments->payment_date)->locale('id')->isoFormat('dddd'): 'Unknown' }}
                                                        </span>
                                                        <span>{{ $payments->payment_date? \Carbon\Carbon::parse($payments->payment_date)->locale('id')->isoFormat('DD MMMM YYYY'): 'Unknown' }}
                                                        </span></time>
                                                    <div class="timeline-icon bg-violet"><i class="fa fa-exclamation"
                                                            style="margin-top: 18px"></i>
                                                    </div>
                                                    <div class="timeline-label bg-violet">
                                                        <h4 class="timeline-title">Tanggal Transfer</h4>

                                                        <p>Tolerably earnestly middleton extremely distrusts she boy now
                                                            not.
                                                            Add and offered prepare how cordial.</p>
                                                    </div>
                                                </div>
                                            </article>

                                            <article class="timeline-entry left-aligned">
                                                <div class="timeline-entry-inner">
                                                    <time datetime="{{ $payments->created_at }}" class="timeline-time">
                                                        <span>{{ $payments->created_at? \Carbon\Carbon::parse($payments->created_at)->locale('id')->isoFormat('HH:mm'): 'Unknown' }}
                                                        </span>
                                                        <span>{{ $payments->created_at? \Carbon\Carbon::parse($payments->created_at)->locale('id')->isoFormat('DD MMMM YYYY'): 'Unknown' }}
                                                        </span></time>
                                                    <div class="timeline-icon bg-green"><i
                                                            class="fa fa-group"style="margin-top: 16px"></i></div>
                                                    <div class="timeline-label bg-green">
                                                        <h4 class="timeline-title">Pembayaran Diterima</h4>

                                                        <p>Caulie dandelion maize lentil collard greens radish arugula sweet
                                                            pepper water spinach kombu courgette.</p>
                                                    </div>
                                                </div>
                                            </article>
                                            @if ($payments->updated_at != $payments->created_at)
                                                <article class="timeline-entry">
                                                    <div class="timeline-entry-inner">
                                                        <time datetime="{{ $payments->updated_at }}" class="timeline-time">
                                                            <span>{{ $payments->updated_at? \Carbon\Carbon::parse($payments->updated_at)->locale('id')->isoFormat('HH:mm'): 'Unknown' }}</span>
                                                            <span>{{ $payments->updated_at? \Carbon\Carbon::parse($payments->updated_at)->locale('id')->isoFormat('DD MMMM YYYY'): 'Unknown' }}</span>
                                                        </time>
                                                        <div class="timeline-icon bg-orange"><i class="fa fa-paper-plane"
                                                                style="margin-top: 16px"></i>
                                                        </div>
                                                        <div class="timeline-label bg-orange">
                                                            <h4 class="timeline-title">Pembayaran Disetujui</h4>

                                                            <p><img src="https://www.bootdey.com/image/45x45/"
                                                                    alt="" class="timeline-img pull-left">Parsley
                                                                amaranth tigernut
                                                                silver
                                                                beet maize fennel spinach ricebean black-eyed. Tolerably
                                                                earnestly
                                                                middleton extremely distrusts she boy now not. Add and
                                                                offered
                                                                prepare how cordial.</p>
                                                        </div>
                                                    </div>
                                                </article>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row mt-5">
                                <!-- Start left col -->
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5>Informasi Pembeli</h5>
                                        <hr class="mt-1 mb-1">
                                        <a class="text-primary font-size-16">{{ $payments->name }}</a>
                                        <br>
                                        <span> Telp: {{ $payments->purchaseValidation->telpon }}</span>
                                        <br>
                                        <span> Alamat: {{ $payments->purchaseValidation->address }}
                                    </div>
                                </div>
                                <!-- Stop left col -->
                                <!-- Start Rifht col -->
                                <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5>Order Kepada</h5>
                                        <hr class="mt-1 mb-1">
                                        <a class="text-primary font-size-16">PT. Mutiara Putri Gemilang</a>
                                        <br>
                                        <span> Telp: +62-812-4998-5217</span>
                                        <br>
                                        <span> Email: pt.mutiaraputrigemilang@gmail.com
                                    </div>
                                </div>
                                <!-- Stop right col -->
                            </div>

                            <!-- Start Row -->
                            <div class="row align-items-center">
                                <div class="table-responsive">
                                    <table class="table align-middle table-nowrap table-check" id="tableOrder">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="fw-bold">Foto Produk</th>
                                                <th class="fw-bold">Produk</th>
                                                <th class="fw-bold">Harga</th>
                                                <th class="fw-bold">Tanggal Bayar</th>
                                                <th class="fw-bold">Tipe Pembelian</th>
                                                <th class="fw-bold">Tenor</th>
                                                <th class="fw-bold">Ditransfer Dari</th>
                                                <th class="fw-bold">Bank Tujuan</th>
                                                <th class="fw-bold">Nama Rekening</th>
                                                <th class="fw-bold">Nominal</th>
                                                <th class="fw-bold">Bukti Transfer</th>
                                                <th class="fw-bold">Deskripsi</th>
                                                <th class="fw-bold">Status</th>
                                                <th class="fw-bold">Dibuat Pada</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <img src="{{ URL::asset('storage/' . $payments->product->photo) }}"
                                                        alt="" class="img-fluid">
                                                </td>
                                                <td>
                                                    {{ $payments->product->name }}
                                                </td>
                                                <td>
                                                    {{ number_format($payments->product->price, 2, ',', '.') }}
                                                </td>
                                                <td>
                                                    {{ \Carbon\Carbon::parse($payments->payment_date)->format('d M Y') }}
                                                </td>
                                                <td>
                                                    {{ $payments->type }}
                                                </td>
                                                <td>
                                                    @if ($payments->tenor !== null)
                                                        {{ $payments->tenor }}
                                                    @else
                                                        <span class="text-danger">Null</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $payments->home_bank }}
                                                </td>
                                                <td>
                                                    {{ $payments->destination_bank }}
                                                </td>
                                                <td>
                                                    {{ $payments->rekening_name }}
                                                </td>
                                                <td>
                                                    {{ $payments->nominal }}
                                                </td>
                                                <td><a href="{{ asset('storage/uploads/' . $payments->transfer) }}"
                                                        target="_blank">Bukti Transfer</a>
                                                </td>
                                                <td>
                                                    @if ($payments->payment_description !== null)
                                                        {{ $payments->payment_description }}
                                                    @else
                                                        <span class="text-danger">Tidak ada deskripsi</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $payments->status }}
                                                </td>
                                                <td>
                                                    {{ $payments->created_at }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-lg-4">
                                    <div class="table-responsive ">
                                        <table class="table mb-0">
                                            <tbody>
                                                <tr>
                                                    <td>Subtotal :</td>
                                                    <td class="text-end">
                                                        Rp {{ number_format($payments->product->price, 2, ',', '.') }}</td>
                                                </tr>

                                                <tr>
                                                    <td>Total Diskon : </td>
                                                    <td class="text-end">Rp (0.00)</td>
                                                </tr>

                                                <tr>
                                                    <td>Pajak : </td>
                                                    <td class="text-end">Rp 0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>Total :</td>
                                                    <td class="text-end">Rp
                                                        {{ number_format($payments->product->price, 2, ',', '.') }}</td>

                                                </tr>
                                                <tr>
                                                    <th>Pajak Included :</th>
                                                    <th class="text-end">Rp 0.00</th>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-advanced.init.js') }}"></script>

    <script src="{{ URL::asset('assets/js/pages/ecommerce-cart.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
