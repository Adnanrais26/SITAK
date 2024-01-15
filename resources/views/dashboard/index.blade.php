@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Dashboard</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            {{-- <li><a href="#">Tables</a></li>
            <li class="active">Data Tables</li> --}}
        </ol>

        <!-- Start Page Header Right Div -->
        {{-- <div class="right">
            <div class="btn-group" role="group" aria-label="...">
                <a href="index.html" class="btn btn-light">Dashboard</a>
                <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
                <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
                <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
            </div>
        </div> --}}
        <!-- End Page Header Right Div -->

    </div>
    <!-- End Page Header -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START CONTAINER -->
    {{-- <div class="container-padding"> --}}


    <!-- Start Row -->
    <div class="row">

        <!-- End Top Stats -->
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="panel panel-default " >
                    {{-- <div class="panel-title">
                        Produk Terlaris
                    </div> --}}
                    <ul class="topstats clearfix">
                        <li class="arrow"></li>
                        <li class="col-xs-6 col-lg-2">
                            <span class="title"><i class="fa fa-eye"></i> Jumlah Produk</span>
                            <h3 class="color-up">{{$jumlahProduk}}</h3>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                            <span class="title"><i class="fa fa-shopping-cart"></i> Penjualan</span>
                            <h3 class="color-up">{{$penjualan}}</h3>
                        </li>
                        <li class="col-xs-6 col-lg-2">
                            <span class="title"><i class="fa fa-calendar-o"></i> Pemasukan</span>
                            <h3>Rp. {{number_format($pemasukan,0,',','.');}}</h3>
                            
                            
                            {{-- <span class="diff"><b class="color-up"><i class="fa fa-caret-up"></i> 26%</b> from last
                                week</span> --}}
                        </li>
                        <li class="col-xs-6 col-lg-2">
                            <span class="title"><i class="fa fa-users"></i> Pengeluaran</span>
                            <h3 class="color-down">Rp. {{number_format($pengeluaran,0,',','.');}}</h3>
                        </li>

                        <li class="col-xs-6 col-lg-2">
                            <span class="title"><i class="fa fa-clock-o"></i> Margin</span>
                            <h3>Rp. {{number_format($margin,0,',','.');}}</h3>

                        </li>
                        <li class="col-xs-6 col-lg-2">
                            <span class="title"><i class="fa fa-dot-circle-o"></i> Keuntungan</span>
                            @php
                            $a = $keuntungan ;
                            @endphp
                            @if ($a > 0)
                            <h3 class="color-up">Rp. {{number_format($keuntungan,0,',','.');}}</h3>

                            @else
                            <h3 class="color-down">Rp. {{number_format($keuntungan,0,',','.');}}</h3>

                            @endif

                            {{-- <h3>Rp. {{number_format($keuntungan,0,',','.');}}</h3> --}}
                            {{-- <span class="diff"><b class="color-down"><i class="fa fa-caret-down"></i> 26%</b> from
                                yesterday</span> --}}
                        </li>
                    </ul>
                </div>
            </div>
            @if (is_null($grafikTerlaris))
            
            @else

            <div class="col-md-6">
                <div class="panel panel-default " style="min-height: 417px;">
                    <!-- Start Chart -->
                    <div class="panel-title">
                        {{-- Produk Terlaris Bulan {{date("F",strtotime($date))}} --}}
                        Grafik Produk Terlaris Bulan {{date("F", mktime(0, 0, 0, $dateMonth, 10))}} {{$dateYear}}
                    </div>
                    <div class="panel-body">
                                {{-- <a href=""> kosong</a> --}}
                                {{-- <a href=""> isi</a> --}}
                                <div id="chartist-line-area-laris" class="ct-chart ct-perfect-fourth "></div>

                        {{-- <div id="chartist-line-area-laris" class="ct-chart ct-perfect-fourth "></div> --}}
                        
                        {{-- <a href="">{{json_encode($item->kodeProduk)}}</a> --}}


                    </div>
                    <!-- End Chart -->
                </div>
            </div>
            @endif

            <div class="col-md-6">
                <div class="panel panel-default" style="min-height: 417px;">
                    <!-- Start Chart -->
                    <div class="panel-title">
                        Data Produk Habis {{date("F", mktime(0, 0, 0, $dateMonth, 10))}} {{$dateYear}}
                    </div>
                    <div class="panel-body">
                        {{-- <div id="chartist-line-area-stok" class="ct-chart ct-perfect-fourth "></div> --}}
                        <div class="panel-body table-responsive">

                            <table id="dataStok" class="table display">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Obat</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stokBarang as $stok)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $stok->obat }}</td>
                                        <td>{{ $stok->jumlah }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
    
    
                        </div>
                    </div>
                    <!-- End Chart -->
                </div>
            </div>
            
            @if (is_null($pendapatan))
            @else

            <div class="col-md-6">
                <div class="panel panel-default" style="min-height: 417px;">
                    <!-- Start Chart -->
                    <div class="panel-title">
                        Grafik Pendapatan Perbulan {{date("F", mktime(0, 0, 0, $dateMonth, 10))}} {{$dateYear}}
                    </div>
                    <div class="panel-body">
                        {{-- <div id="chartist-line-area-pendapatan" class="ct-chart ct-perfect-fourth "></div> --}}
                        {{-- <a href=""> kosong</a> --}}
                        {{-- <a href=""> isi</a> --}}
                        <div id="chartist-line-area-pendapatan" class="ct-chart ct-perfect-fourth "></div>

                    </div>
                    <!-- End Chart -->
                </div>
            </div>
            @endif
            
            @if (is_null($pengeluaran2))

            @else

            <div class="col-md-6">
                <div class="panel panel-default" style="min-height: 417px;">
                    <!-- Start Chart -->
                    <div class="panel-title">
                        Grafik Pengeluaran Perbulan {{date("F", mktime(0, 0, 0, $dateMonth, 10))}} {{$dateYear}}
                    </div>
                    <div class="panel-body">
                        {{-- <div id="chartist-line-area-pengeluaran" class="ct-chart ct-perfect-fourth "></div> --}}
                                {{-- <a href=""> kosong</a> --}}

                                {{-- <a href=""> isi</a> --}}
                                <div id="chartist-line-area-pengeluaran" class="ct-chart ct-perfect-fourth "></div>


                                
                    </div>
                    <!-- End Chart -->
                </div>
            </div>
            @endif

        </div>
        <!-- End Panel -->
    </div>
    <!-- End Row -->
    {{-- </div> --}}
    <!-- END CONTAINER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->


    <!-- ================================================
Chartist
================================================ -->
    <!-- main file -->
    <!-- demo codes -->
    {{-- <script src="{{ asset('') }}backend/js/chartist/chartist-plugin.js"></script> --}}

    {{-- @foreach ($grafikTerlaris as $grafikTerlaris) --}}


    <script src="{{ asset('') }}backend/js/chartist/chartist.js"></script>

    <script>
        /* ======================================================================
    Line Chart with Area
    ====================================================================== */
        new Chartist.Line('#chartist-line-area-laris', {
            labels: [
                @foreach($grafikTerlaris as $item)
                    '{{$item->obat}}',
                @endforeach

            ],
            series: [
                [
                    @foreach($grafikTerlaris as $item)
                        {{$item->jumlah}},
                    @endforeach 
                ]
            ]
        }, {
            low: 0,
            showArea: true,
            // height: 200,
            axisY: {
                offset: 70
            },
        });
    </script>

<script>
    /* ======================================================================
Line Chart with Area
====================================================================== */
    new Chartist.Line('#chartist-line-area-stok', {
        labels: [
            @foreach($stokBarang as $item)
                {{$item->kodeProduk}},
            @endforeach

        ],
        series: [
            [
                @foreach($stokBarang as $item)
                    {{$item->jumlah}},
                @endforeach 
            ]
        ]
    }, {
        low: 0,
        showArea: true,
        // height: 200,
        axisY: {
            offset: 70
        },
    });
</script>
<script>
    /* ======================================================================
Line Chart with Area
====================================================================== */
    new Chartist.Line('#chartist-line-area-pendapatan', {
        labels: [
            @foreach($pendapatan as $item)
                '{{date("F", mktime(0, 0, 0, $item->month, 10))}}',
            @endforeach

        ],
        series: [
            [
                @foreach($pendapatan as $item)
                    {{$item->total}},
                @endforeach 
            ]
        ]
    }, {
        low: 0,
        showArea: true,
        // height: 200,
        axisY: {
            offset: 70
        },
    });
</script>
<script>
    /* ======================================================================
Line Chart with Area
====================================================================== */
    new Chartist.Line('#chartist-line-area-pengeluaran', {
        labels: [
            @foreach($pengeluaran2 as $item)
                '{{date("F", mktime(0, 0, 0, $item->month, 10))}}',
            @endforeach

        ],
        series: [
            [
                @foreach($pengeluaran2 as $item)
                    {{$item->total}},
                @endforeach 
            ]
        ]
    }, {
        low: 0,
        showArea: true,
        // height: 200,
        axisY: {
            offset: 70
        },
    });
</script>
<script>
    $(document).ready(function () {
        // $('#dataStok').DataTable();
    });

</script>
    @endsection