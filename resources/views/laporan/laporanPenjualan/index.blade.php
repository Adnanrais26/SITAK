@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Laporan Penjualan</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Laporan Penjualan</li>
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
                        Laporan Penjualan
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

                        <table id="datapenjualan" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pembeli</th>
                                    <th>Telpon</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Unit</th>
                                    <th>Harga</th>
                                    <th>total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan as $penjualan)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $penjualan->created_at }}</td>
                                    <td>{{ $penjualan->namaPembeli }}</td>
                                    <td>{{ $penjualan->noTelp }}</td>
                                    <td>{{ $penjualan->kodeProduk }}</td>
                                    <td>{{ $penjualan->obat }}</td>
                                    <td>{{ $penjualan->jumlah }}</td>
                                    <td>{{ $penjualan->unit }}</td>
                                    <td>{{ $penjualan->hargaJual }}</td>
                                    <td>{{ $penjualan->total }}</td>
                                    </td>
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
        // $(document).ready(function () {
        //     $('#datajenis').DataTable({

        //     });
        // });

        // $(document).ready(function () {
        //     $('#datajenis').DataTable({
        //         dom: 'Bfrtip',
        //         buttons: [
        //             'copy', 'csv', 'excel', 'pdf', 'print'
        //         ]
        //     });
        // });
        $(document).ready(function () {
            $('#datapenjualan').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });

    </script>

    @endsection
