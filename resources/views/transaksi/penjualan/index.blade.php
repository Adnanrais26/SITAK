@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Penjualan</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Transaksi</a></li>
            <li class="active">Penjualan</li>
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
                        Transaksi Penjualan Obat
                        {{-- <a href="#" class="btn btn-light pull-right" data-toggle="modal" data-target="#myModalTambah">
                            <i class="fa fa-plus-square"></i></a> --}}
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


                        <form action="{{route('penjualan.store')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <label for="input1" class="form-label">Kode Produk</label>
                                </div>
                                <div class="">
                                    <div class="col-md-12">

                                        <input type="text" id="search" name="search" class="form-control"
                                            placeholder="Search Obat" autocomplete="off" autofocus>
                                        <div id="result" class="panel panel-default" style="display:none">
                                            <ul class="list-group" id="memList" style="margin-top: -20px;">
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-1">
                                            <button type="submit" class="btn btn-primary" style="
                                            padding: 7px 10px 7px 10px;
                                            margin-left: -34%;">Search</button>
                                        </div> --}}
                                </div>
                                <div class="col-md-12">
                                    <hr>

                                </div>
                                @if ($namaPembeli == "" || $noTelp == "")
                                <div class="form-grop col-md-6">
                                    <label for="input1" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control" name="namaPembeli">
                                </div>
                                <div class="form-grop col-md-6">
                                    <label for="input1" class="form-label">No Telpon Pelanggan</label>
                                    <input type="number" class="form-control" name="noTelp">
                                </div>
                                @else
                                <div class="form-grop col-md-6">
                                    <label for="input1" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control" name="namaPembeli" value="{{$namaPembeli}}">
                                </div>
                                <div class="form-grop col-md-6">
                                    <label for="input1" class="form-label">No Telpon Pelanggan</label>
                                    <input type="text" class="form-control" name="noTelp" value="{{$noTelp}}">
                                </div>
                                @endif

                                <br>
                                <div class="form-group col-md-6" id="findObat1">
                                    @if ($idproduk == 0)
                                    <div id="findObat">

                                    </div>
                                    @else
                                    <br>

                                    {{-- <label for="input1" class="form-label">ID Produk</label> --}}
                                    <input type="hidden" class="form-control" name="obatId" readonly
                                        value="{{ $obat->idObat }}">

                                    <label for="input1" class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control" name="kodeProduk" readonly
                                        value="{{ $obat->kodeProduk }}">

                                    <label for="input1" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="obat" readonly
                                        value="{{ $obat->obat }}">

                                    <label for="input1" class="form-label">Unit</label>
                                    <input type="hidden" class="form-control" name="unitId" readonly
                                        value="{{ $obat->unitId }}">
                                        <input type="text" class="form-control"  readonly
                                        value="{{ $obat->unit}}">
                                    <br>
                                    @php
                                    $active = $obat->active;
                                    @endphp
                                    @if ($active > 1)

                                    <div class="col-md-12 kode-alert alert6">
                                        {{-- <a href="#" class="closed">&times;</a> --}}
                                        <h4 class="form-group" style="color: rgb(243, 243, 243)">Barang sedang tidak
                                            dijual </h4>
                                    </div>
                                    @else

                                    @endif
                                </div>
                                <div class="form-group col-md-6" id="findObat1">
                                    <br>
                                    <label for="input1" class="form-label">Harga</label>
                                    <input type="text" class="form-control" name="hargaJual" readonly
                                        value="{{ $obat->hargaJual }}">

                                    {{-- <label for="input1" class="form-label">HargaBeli</label> --}}
                                    <input type="hidden" class="form-control" name="hargaBeli" readonly
                                        value="{{ $obat->hargaBeli }}">

                                    <label for="input1" class="form-label">Stok Produk</label>
                                    <input type="number" class="form-control" readonly value="{{ $obat->jumlah }}">
                                    @php
                                    $active = $obat->active;
                                    @endphp
                                    @if ($active > 1)

                                    <label for="input1" class="form-label">Jumlah Produk</label>
                                    <input type="text" min="1" max="{{ $obat->jumlah }}" class="form-control"
                                        name="jumlah" readonly>

                                    @else
                                    <label for="input1" class="form-label">Jumlah Produk</label>
                                    <input type="number" min="1" max="{{ $obat->jumlah }}" class="form-control"
                                        name="jumlah">

                                    {{-- <hr> --}}
                                    {{-- <button type="submit" class="btn btn-white pull-right">Tambah</button> --}}
                                    
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-warning">Tambah</button>
                                </div>
                                @endif

                                @endif
                            </div>
                            
                        </form>

                        <div class="form-group col-md-12">
                            <form action="/penjualan/struk" method="post">
                                @csrf
                                @method('POST')
                                {{-- <h1>Total <b class="pull-right">Rp. 100.0000</b></h1>{{ $total }} --}}
                                <h1>Total <b class="pull-right">Rp. {{ number_format($hasil_rupiah,0,',','.') }}</b>
                                </h1>
                                <input type="hidden" class="form-control" id="total" name="total" readonly
                                    value="{{ $hasil_rupiah }}">
                                <h4 for="input1" class="form-label">Tunai
                                    <input type="number" class="form-control" id="tunai" name="tunai" value="" required>
                                </h4>
                                <input type="hidden" class="form-control" name="kodeStruk" readonly
                                    value="TRK{{$kodeStruk}}">
                                @foreach ($penjualan3 as $penjualan3)
                                <input type="hidden" class="form-control" name="kodePenjualan" readonly
                                    value="{{$penjualan3->kodePenjualan}}">
                                @endforeach
                                <input type="hidden" class="form-control" name="userId" readonly value="{{$user_id}}">
                                <hr>

                                <h4>Total <b class="pull-right">Rp. {{ number_format($hasil_rupiah,0,',','.') }}</b>
                                </h4>
                                <h4>Tunai <b id="resulttunai" class="pull-right"> </b></h4>
                                <h4>Kembali <b id="resultkembali" class="pull-right"> </b></h4>
                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-default text-center">Bayar</button>
                                </div>
                            </form>
                            <!-- Modal Bayar Obat-->
                            <form action="/obat/" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <div id="myModalBayar" class="modal fade bd-example-modal-lg" tabindex="-1"
                                    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        {{-- <div class="modal-dialog modal-lg"> --}}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center">Pembayaran Obat</h4>
                                            </div>

                                            <div class="modal-body">
                                                <div class="form-group text-center">
                                                    <label>Apotek Keluarga</label>
                                                    <p> Jl. Pembangunan Perumahan Bumi Jaya Asri RT.02 / RW.11 Ds.
                                                        Jayawaras Kec. Tarogong Kidul Kab. Garut. </p>
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <div class="col-md-8">
                                                        <p>TRK{{$kodeStruk}}</p>
                                                        <p>{{ $date }}</p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <p>Cashier : {{$nama}}</p>
                                                        <p>ID Cashier : {{$user_id}}</p>
                                                        <input type="text" class="form-control" id="input1"
                                                            name="userId" readonly value="{{ $user_id }}">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group text-center">
                                                    <label></label>
                                                    <p> </p>
                                                </div>
                                                <div class="form-group">
                                                    <table class="table display">
                                                        <thead>
                                                            <tr>
                                                                {{-- <th>No</th> --}}
                                                                {{-- <th>Kode Produk</th> --}}
                                                                {{-- <th>Nama Produk</th>
                                                                <th>Jumlah</th>
                                                                <th>Unit</th>
                                                                <th>Harga</th>
                                                                <th>total</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            @foreach ($penjualan2 as $penjualan2)
                                                            <tr>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="userId" readonly
                                                                    value="{{ $penjualan2->id }}">
                                                                <td>{{ ++$i }}</td>
                                                                {{-- <td>{{ $penjualan->id }}</td> --}}
                                                                {{-- <td>{{ $penjualan2->kodeProduk }}</td> --}}
                                                                <td>{{ $penjualan2->obat }}</td>
                                                                <td>{{ $penjualan2->jumlah }}</td>
                                                                <td>{{ $penjualan2->unit }}</td>
                                                                <td>{{ $penjualan2->hargaJual }}</td>
                                                                <td>{{ $penjualan2->total }}</td>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                    <h5>Total <b class="pull-right">{{ $hasil_rupiah }}</b></h5>
                                                    <h5 for="input1" class="form-label">Cash<input type="number"
                                                            class="pull-right" id="input1" name="cash_modal"
                                                            id="cash_modal"></h5>

                                                    <p>Konsumen <b class="pull-right">{{$namaPembeli}}</b></p>
                                                    <p>Telpon <b class="pull-right">{{$noTelp}}</b></p>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-flat btn-primary"
                                                    data-dismiss="modal">No</button>
                                                {{-- <a href="{{ route('obat.destroy', $user->id) }}"
                                                class="btn btn-danger btn-flat" style="width:90px;"
                                                data-toggle="modal">Yes</a> --}}
                                                <button type="submit" class="btn btn-flat btn-danger">yes</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        </form>
                        <!-- End Modal Code -->
                    </div>



                    <div class="form-group panel-body table-responsive col-md-12">
                        <table id="datapenjualan" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Unit</th>
                                    <th>Harga</th>
                                    <th>total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <p style="color: white;">{{ $a = 0;}} Apotek Keluarga 0</p>
                                @foreach ($penjualan as $penjualan)
                                <tr>
                                    <td>{{ ++$a }}</td>
                                    <td>{{ $penjualan->kodeProduk }}</td>
                                    <td>{{ $penjualan->obat }}</td>
                                    <td>{{ $penjualan->jumlah }}</td>
                                    <td>{{ $penjualan->unit }}</td>
                                    <td>{{ $penjualan->hargaJual }}</td>
                                    <td>{{ $penjualan->total }}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#myModalHapus{{ $penjualan->id }}">
                                            <i class="fa fa-close"></i>
                                        </a>

                                        <!-- Modal hapus Obat-->
                                        <form action="{{ route('penjualan.destroy', $penjualan->id) }}" method="post"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <div class="modal fade" id="myModalHapus{{ $penjualan->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title text-center">Hapus Produk
                                                                {{ $penjualan->obat }} ?
                                                                <input type="hidden" class="form-control" id="input1"
                                                                    name="obatId" readonly
                                                                    value="{{ $penjualan->obatId }}">
                                                                <input type="hidden" class="form-control" id="input1"
                                                                    name="jumlah" readonly
                                                                    value="{{ $penjualan->jumlah }}">
                                                            </h4>
                                                        </div>

                                                        <div class="modal-body text-center">
                                                            <button type="button" class="btn btn-flat btn-primary"
                                                                data-dismiss="modal">No</button>
                                                            {{-- <a href="{{ route('obat.destroy', $user->id) }}"
                                                            class="btn btn-danger btn-flat" style="width:90px;"
                                                            data-toggle="modal">Yes</a> --}}
                                                            <button type="submit"
                                                                class="btn btn-flat btn-danger">yes</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Modal Code -->
                                    </td>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

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
        //   $("input").keydown(function(){
        //     $("input").css("background-color", "yellow");
        //   });
        $("#tunai, #total").keyup(function () {
            var input1 = $("#total").val();
            var input2 = $("#tunai").val();

            var result = input2 - input1;
            // $("#tunai").css("background-color", "pink");
            $("#kembali").val(result);
            $("#resultkembali").html('Rp.' + result);
            $("#resulttunai").html('Rp.' + input2);
            // $('#tunai').autoNumeric('init');
        });
    });

</script>

<script>
    $(function () {
        $("#resulttunai").load(function (e) {
            $(this).val(format($(this).val()));
        });
    });
    var format = function (num) {
        var str = num.toString().replace("", ""),
            parts = false,
            output = [],
            i = 1,
            formatted = null;
        if (str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for (var j = 0, len = str.length; j < len; j++) {
            if (str[j] != ",") {
                output.push(str[j]);
                if (i % 3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };

</script>
<script>
    $(document).ready(function () {
        $('#datapenjualan').DataTable();
        // $('#findObat1').hide();

    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#search').keyup(function () {
            var search = $('#search').val();
            // alert(search);
            if (search == "") {
                $("#memList").html("");
                $('#result').hide();

            } else {
                $.get("{{ route('penjualan.search') }}", {
                    search: search
                }, function (data) {
                    $('#memList').empty().html(data);
                    $('#result').show();
                })
            }
        });
    });

</script>



@endsection
