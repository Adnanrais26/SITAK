@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Laporan Pengeluaran</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Laporan</a></li>
            <li class="active">Laporan Pengeluaran</li>
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
                        Laporan Pengeluaran
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

                        <table id="datajenis" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Pengeluaran</th>
                                    <th>Jenis</th>
                                    <th>Distributor</th>
                                    <th>Jumlah</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengeluarans as $pengeluaran)


                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $pengeluaran->tanggalPengeluaran }}</td>
                                    <td>{{ $pengeluaran->pengeluaran }}</td>
                                    <td>{{ $pengeluaran->jenisPengeluaran }}</td>
                                    <td>{{ $pengeluaran->distributor }}</td>
                                    <td>Rp. {{ number_format($pengeluaran->jumlah,0,',','.') }}</td>
                                    <td>{{ $pengeluaran->keterangan }}</td>
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
        $(document).ready(function() {
            $('#datajenis').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
        } );
    </script>

    @endsection
