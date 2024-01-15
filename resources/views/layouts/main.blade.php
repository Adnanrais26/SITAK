<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
    <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
    <title>SITAK | Sistem Informasi Transaksi Apotek Keluarga</title>

    <!-- ========== Css Files ========== -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script> --}}

    <link href="{{ asset('backend/css/root.css') }}" rel="stylesheet">
    
    <!-- css tambahan  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" />
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script> --}}
      <!-- ================================================
  jQuery Library
  ================================================ -->
  <script src="{{ asset('backend/js/jquery.min.js') }}"></script>

  <!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
  <script src="{{ asset('backend/js/bootstrap/bootstrap.min.js') }}"></script>

  <!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
  <script src="{{ asset('backend/js/plugins.js') }}"></script>

  <!-- ================================================
Bootstrap Select
================================================ -->
  {{-- <script src="{{ asset('backend/js/bootstrap-select/bootstrap-select.js') }}"></script> --}}

  <!-- ================================================
Bootstrap Toggle
================================================ -->
  {{-- <script src="{{ asset('backend/js/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script> --}}

  <!-- ================================================
Bootstrap WYSIHTML5
================================================ -->
  <!-- main file -->
  {{-- <script src="{{ asset('backend/js/bootstrap-wysihtml5/wysihtml5-0.3.0.min.js') }}"></script> --}}
  <!-- bootstrap file -->
  {{-- <script src="{{ asset('backend/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js') }}"></script> --}}

  <!-- ================================================
Summernote
================================================ -->
  {{-- <script src="{{ asset('backend/js/summernote/summernote.min.js') }}"></script> --}}

  <!-- ================================================
Flot Chart
================================================ -->
  <!-- main file -->
  {{-- <script src="{{ asset('') }}backend/js/flot-chart/flot-chart.js"></script> --}}
  <!-- time.js -->
  {{-- <script src="{{ asset('') }}backend/js/flot-chart/flot-chart-time.js"></script> --}}
  <!-- stack.js -->
  {{-- <script src="{{ asset('') }}backend/js/flot-chart/flot-chart-stack.js"></script> --}}
  <!-- pie.js -->
  {{-- <script src="{{ asset('') }}backend/js/flot-chart/flot-chart-pie.js"></script> --}}
  <!-- demo codes -->
  {{-- <script src="{{ asset('') }}backend/js/flot-chart/flot-chart-plugin.js"></script> --}}

  <!-- ================================================
Chartist
================================================ -->
  <!-- main file -->
  {{-- <script src="{{ asset('') }}backend/js/chartist/chartist.js"></script> --}}
  <!-- demo codes -->
  {{-- <script src="{{ asset('') }}backend/js/chartist/chartist-plugin.js"></script> --}}

  <!-- ================================================
Easy Pie Chart
================================================ -->
  <!-- main file -->
  {{-- <script src="{{ asset('') }}backend/js/easypiechart/easypiechart.js"></script> --}}
  <!-- demo codes -->
  {{-- <script src="{{ asset('') }}backend/js/easypiechart/easypiechart-plugin.js"></script> --}}

  <!-- ================================================
Rickshaw
================================================ -->
  <!-- d3 -->
  {{-- <script src="{{ asset('') }}backend/js/rickshaw/d3.v3.js"></script> --}}
  <!-- main file -->
  {{-- <script src="{{ asset('') }}backend/js/rickshaw/rickshaw.js"></script> --}}
  <!-- demo codes -->
  {{-- <script src="{{ asset('') }}backend/js/rickshaw/rickshaw-plugin.js"></script> --}}





  <!-- ================================================
Sweet Alert
================================================ -->
  {{-- <script src="{{ asset('') }}backend/js/sweet-alert/sweet-alert.min.js"></script> --}}

  <!-- ================================================
Kode Alert
================================================ -->
  {{-- <script src="{{ asset('') }}backend/js/kode-alert/main.js"></script> --}}

  <!-- ================================================
jQuery UI
================================================ -->
  {{-- <script src="{{ asset('') }}backend/js/jquery-ui/jquery-ui.min.js"></script> --}}

  <!-- ================================================
Moment.js
================================================ -->
  <script src="{{ asset('') }}backend/js/moment/moment.min.js"></script>

  <!-- ================================================
Full Calendar
================================================ -->
  {{-- <script src="{{ asset('') }}js/full-calendar/fullcalendar.js"></script> --}}

  <!-- ================================================
Bootstrap Date Range Picker
================================================ -->
  <script src="{{ asset('') }}backend/js/date-range-picker/daterangepicker.js"></script>
  
<!-- ================================================
Data Tables
================================================ -->
  {{-- <script src="{{ asset('') }}backend/js/datatables/datatables.min.js"></script> --}}
  {{-- <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script> --}}
  
  <!-- jquery datatable -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    
  <!-- script tambahan  -->
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js">
  </script>

</head>

<body>
    <!-- Start Page Loading -->
    {{-- <div class="loading"><img src="{{ asset('backend/img/loading.gif') }} " alt="loading-img"></div> --}}
    <!-- End Page Loading -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START TOP -->
    @php
        $role= auth()->user()->role_id;
    @endphp

    @if ($role == 1)
    <div id="top" class="clearfix">
        
    @elseif($role == 2)
    <div id="top" class="clearfix" style="background: #ba3f32;">

    @elseif($role == 3)
    <div id="top" class="clearfix" style="background: #26a65b;">
        
    @endif


        <!-- Start App Logo -->
        <div class="applogo">
            <a href="index.html" class="logo">SITAK</a>
        </div>
        <!-- End App Logo -->

        <!-- Start Sidebar Show Hide Button -->
        <a href="#" class="sidebar-open-button"><i class="fa fa-bars"></i></a>
        <a href="#" class="sidebar-open-button-mobile"><i class="fa fa-bars"></i></a>
        <!-- End Sidebar Show Hide Button -->

        
        <!-- Start Top Right -->
        <ul class="top-right">

            <li class="dropdown link">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle profilebox"><b>{{  $nama }}</b><span
                        class="caret"></span></a>
                <ul class="dropdown-menu dropdown-menu-list dropdown-menu-right">
                    {{-- <li role="presentation" class="dropdown-header">Profile</li> --}}
                    <li>
                        <a onclick="myFunction()"><i class="fa falist fa-power-off"></i> Logout</a>
                        <form id="logout" action="/logout" method="post">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- End Top Right -->

    </div>
    <!-- END TOP -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->


    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <!-- START SIDEBAR -->

@if ($role == 1)
<div class="sidebar clearfix">

    <ul class="sidebar-panel nav">
        <li class="sidetitle">MAIN</li>
        <li><a href="{{ asset('/dashboard') }}"><span class="icon color5"><i
                        class="fa fa-home"></i></span>Dashboard<span class="label label-default">2</span></a></li>
        
        <li><a href="#"><span class="icon color7"><i class="fa fa-flask"></i></span>Transaksi<span
                    class="caret"></span></a>
            <ul>
                {{-- <li><a href="{{ asset('/pembayaranPiutang') }}">Pembayaran Piutang</a></li> --}}
                <li><a href="{{ asset('/pengeluaran') }}">Pengeluaran </a></li>
                {{-- <li><a href="{{ asset('/penjualan/0') }}">Penjualan</a></li> --}}
                {{-- <li><a href="{{ asset('/penjualan/0') }}">Penjualan</a></li> --}}
            </ul>
        </li>
        <li><a href="#"><span class="icon color7"><i class="fa fa-flask"></i></span>Gudang<span
                    class="caret"></span></a>
            <ul>
                <li><a href="{{ asset('/kategoriObat') }}">Kategori Obat</a></li>
                <li><a href="{{ asset('/jenisObat') }}">Jenis Obat</a></li>
                <li><a href="{{ asset('/unit') }}">Unit</a></li>
                <li><a href="{{ asset('/obat') }}">Obat</a></li>
                {{-- <li><a href="panels.html">Barcode</a></li> --}}
            </ul>
        </li>
        <li><a href="{{ asset('/stokOpname') }}"><span class="icon color6"><i
                        class="fa fa-envelope-o"></i></span>Stok Opname<span class="label label-default">19</span></a>
        </li>
        {{-- <li><a href="charts.html"><span class="icon color8"><i class="fa fa-bar-chart"></i></span>Laporan</a></li> --}}
        <li><a href="#"><span class="icon color9"><i class="fa fa-th"></i></span>Laporan<span
                    class="caret"></span></a>
            <ul>
                <li><a href="{{ asset('/laporanPengeluaran') }}">Laporan Pengeluaran</a></li>
                <li><a href="{{ asset('/laporanPenjualan') }}">Laporan Penjualan</a></li>
                <li><a href="{{ asset('/laporanPendapatan') }}">Laporan Pendapatan</a></li>
                <li><a href="{{ asset('/pembayaranPiutang') }}">Laporan Pembayaran Piutang</a></li>

                {{-- <li><a href="{{ asset('/laporanRetur') }}">Laporan Retur</a></li> --}}
                
                
            </ul>
        </li>
        <li><a href="#"><span class="icon color14"><i class="fa fa-paper-plane-o"></i></span>Apotek<span
                    class="caret"></span></a>
            <ul>
                <li><a href="{{ asset('/jenisPengeluaran') }}">Jenis Pengeluaran</a></li>
                <li><a href="{{ asset('/barcode') }}">Barcode</a></li>
                <li><a href="{{ asset('/retur/0') }}">Retur Barang</a></li>
            </ul>
        </li>
        <li><a href="#"><span class="icon color10"><i class="fa fa-check-square-o"></i></span>Akun<span
            class="caret"></span></a>
    <ul>
        <li><a href="{{ asset('/profile') }}">Profile</a></li>
        <li><a href="{{ asset('/daftarakun') }}">Daftar Akun</a></li>
        <li><a href="{{ asset('/gantipassword') }}">Ganti Password</a></li>
    </ul>

</div>
@elseif($role == 2)
<div class="sidebar clearfix">

    <ul class="sidebar-panel nav">
        <li class="sidetitle">MAIN</li>
        <li><a href="{{ asset('/kasboard') }}"><span class="icon color5"><i
                        class="fa fa-home"></i></span>Dashboard<span class="label label-default">2</span></a></li>
        
        <li><a href="#"><span class="icon color7"><i class="fa fa-flask"></i></span>Transaksi<span
                    class="caret"></span></a>
            <ul>
                <li><a href="{{ asset('/penjualan/0') }}">Penjualan</a></li>
                {{-- <li><a href="{{ asset('/struk') }}">struk</a></li> --}}
            </ul>
        </li>
        
        <li><a href="#"><span class="icon color10"><i class="fa fa-check-square-o"></i></span>Akun<span
            class="caret"></span></a>
    <ul>
        <li><a href="{{ asset('/kasprofile') }}">Profile</a></li>
        <li><a href="{{ asset('/kasgantipassword') }}">Ganti Password</a></li>
    </ul>

</div>
@elseif($role == 3)
<div class="sidebar clearfix">

    <ul class="sidebar-panel nav">
        <li class="sidetitle">MAIN </li>
        <li><a href="{{ asset('/pemboard') }}"><span class="icon color5"><i
                        class="fa fa-home"></i></span>Dashboard</a></li>
        
        <li><a href="{{ asset('/pemstokOpname') }}"><span class="icon color6"><i
                        class="fa fa-envelope-o"></i></span>Stok Opname<span class="label label-default">19</span></a>
        </li>
        {{-- <li><a href="charts.html"><span class="icon color8"><i class="fa fa-bar-chart"></i></span>Laporan</a></li> --}}
        <li><a href="#"><span class="icon color9"><i class="fa fa-th"></i></span>Laporan<span
                    class="caret"></span></a>
            <ul>
                {{-- <li><a href="{{ asset('/pemlaporanPengeluaran') }}">Laporan Pengeluaran</a></li> --}}
                <li><a href="{{ asset('/pemlaporanPenjualan') }}">Laporan Penjualan</a></li>
                <li><a href="{{ asset('/pemlaporanPendapatan') }}">Laporan Pendapatan</a></li>
                <li><a href="{{ asset('/pembayaranPiutang') }}">Laporan Pembayaran Piutang</a></li>
                
                {{-- <li><a href="{{ asset('/pemlaporanRetur') }}">Laporan Retur</a></li> --}}
                
                
            </ul>
        </li>
        
        <li><a href="#"><span class="icon color10"><i class="fa fa-check-square-o"></i></span>Akun<span
            class="caret"></span></a>
    <ul>
        <li><a href="{{ asset('/pemprofile') }}">Profile</a></li>
        <li><a href="{{ asset('/pemgantipassword') }}">Ganti Password</a></li>
    </ul>

</div>
@endif
    

    </div>
    <!-- END SIDEBAR -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->


    <!-- bagian judul halaman blog -->
    <h3> @yield('judul_halaman') </h3>


    <!-- bagian konten blog -->
    @yield('contents')



    <!-- Start Footer -->
    <div class="row footer">
        <div class="col-md-6 text-left">
            Copyright © 2015 <a href="http://themeforest.net/user/bragher/portfolio" target="_blank">Bragher</a> All
            rights reserved.
        </div>
        <div class="col-md-6 text-right">
            Design and Developed by <a href="http://themeforest.net/user/bragher/portfolio" target="_blank">Bragher</a>
        </div>
    </div>
    <!-- End Footer -->

    </div>
    <!-- End Content -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->
    
    <!-- //////////////////////////////////////////////////////////////////////////// -->


  



    <!-- ================================================
  Below codes are only for index widgets
  ================================================ -->
    <!-- Today Sales -->

    <script>
        function myFunction() {
            document.getElementById("logout").submit();
        }

    </script>
    <script>
        // set up our data series with 50 random data points

        var seriesData = [
            [],
            [],
            []
        ];
        var random = new Rickshaw.Fixtures.RandomData(20);

        for (var i = 0; i < 110; i++) {
            random.addData(seriesData);
        }

        // instantiate our graph!

        var graph = new Rickshaw.Graph({
            element: document.getElementById("todaysales"),
            renderer: 'bar',
            series: [{
                color: "#33577B",
                data: seriesData[0],
                name: 'Photodune'
            }, {
                color: "#77BBFF",
                data: seriesData[1],
                name: 'Themeforest'
            }, {
                color: "#C1E0FF",
                data: seriesData[2],
                name: 'Codecanyon'
            }]
        });

        graph.render();

        var hoverDetail = new Rickshaw.Graph.HoverDetail({
            graph: graph,
            formatter: function (series, x, y) {
                var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
                var swatch = '<span class="detail_swatch" style="background-color: ' + series.color +
                    '"></span>';
                var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
                return content;
            }
        });

    </script>

    <!-- Today Activity -->
    <script>
        // set up our data series with 50 random data points

        var seriesData = [
            [],
            [],
            []
        ];
        var random = new Rickshaw.Fixtures.RandomData(20);

        for (var i = 0; i < 50; i++) {
            random.addData(seriesData);
        }

        // instantiate our graph!

        var graph = new Rickshaw.Graph({
            element: document.getElementById("todayactivity"),
            renderer: 'area',
            series: [{
                color: "#9A80B9",
                data: seriesData[0],
                name: 'London'
            }, {
                color: "#CDC0DC",
                data: seriesData[1],
                name: 'Tokyo'
            }]
        });

        graph.render();

        var hoverDetail = new Rickshaw.Graph.HoverDetail({
            graph: graph,
            formatter: function (series, x, y) {
                var date = '<span class="date">' + new Date(x * 1000).toUTCString() + '</span>';
                var swatch = '<span class="detail_swatch" style="background-color: ' + series.color +
                    '"></span>';
                var content = swatch + series.name + ": " + parseInt(y) + '<br>' + date;
                return content;
            }
        });

    </script>

</body>

</html>
