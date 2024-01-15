@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Barcode</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Apotek</a></li>
            <li class="active">Barcode</li>
        </ol>

        <!-- Start Page Header Right Div -->
        <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a href="index.html" class="btn btn-light">Dashboard</a>
                <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
                <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
                <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
            </div>
        </div>
        <!-- End Page Header Right Div -->

    </div>
    <!-- End Page Header -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTAINER -->
    <div class="container-padding">


        <!-- Start Row -->
        <div class="row">

            <!-- Start Panel -->
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-title">
                        Daftar Akun

                    </div>
                    @if ($message = Session::get('success'))
                    <div class="kode-alert alert3">
                        <a href="#" class="closed">&times;</a>
                        {{ $message }}
                    </div>
                    @endif
                    @if ($message = Session::get('error'))
                    <div class="kode-alert alert6">
                        <a href="#" class="closed">&times;</a>
                        {{ $message }}
                    </div>
                    @endif
                    <div class="panel-body table-responsive">

                        <table id="databarcode" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Produk</th>
                                    <th>Obat</th>
                                    <th>Barcode</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barcode as $barcode)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $barcode->kodeProduk }}</td>
                                    <td>{{ $barcode->obat }}</td>
                                    <td>{!! DNS1D::getBarcodeHTML(''. $barcode->kodeProduk, 'C39') !!}</td>
                                    {{-- <td>
                                        <a href="{{ route('barcode.show', $barcode->kodeProduk) }}"
                                    class="btn btn-info">
                                    <i class="fa fa-search"></i>
                                    </a>
                                    </td> --}}
                                    <td><a href="#" class="btn btn-primary" data-toggle="modal"
                                            data-target="#myModalBarcode{{ $barcode->id }}">
                                            <i class="fa fa-plus-square"></i></a></td>
                                    <!-- Modal Barcode-->
                                    <div class="modal fade" id="myModalBarcode{{ $barcode->id }}" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span
                                                            aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title text-center">Barcode {{ $barcode->obat }}
                                                    </h4>
                                                </div>
                                                <div class="modal-body d-flex align-items-center">
                                                    <div class="row" >
                                                        
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-4 ">
                                                            <br>
                                                            {!! DNS1D::getBarcodeHTML(''. $barcode->kodeProduk, 'C39')!!}
                                                            {!! DNS1D::getBarcodeHTML(''. $barcode->kodeProduk, 'C39')!!}
                                                            {!! DNS1D::getBarcodeHTML(''. $barcode->kodeProduk, 'C39')!!}
                                                            {!! DNS1D::getBarcodeHTML(''. $barcode->kodeProduk, 'C39')!!}
                                                            {!! DNS1D::getBarcodeHTML(''. $barcode->kodeProduk, 'C39')!!}
                                                            <br>
                                                            {{-- <img src="data:image/png;base64, {!! DNS1D::getBarcodeHTML(''. $barcode->kodeProduk, 'C39') !!}"> --}}
                                                        </div>
                                                        <div class="col-md-4"></div>
                                                        <div class="col-md-12 text-center" >
                                                            <h1 style="color: black;letter-spacing: 3px;"> {{$barcode->kodeProduk }} | {{$barcode->obat }}</h1>
                                                            <h1 style="color: black;letter-spacing: 3px;"> </h1>
                                                        </div>
                                                    </div>

                                                </div>
                                                {{-- <div class="modal-footer ">
                                                    <button type="button" class="btn btn-white"
                                                        data-dismiss="modal">Close</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal Code -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Row -->
    </div>
    <!-- END CONTAINER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <script>
        $(document).ready(function () {
            $('#databarcode').DataTable();
        });

    </script>
    <script>
        $(document).ready(function () {
            $('#databarcodecetak').DataTable();
        });

    </script>


    @endsection
