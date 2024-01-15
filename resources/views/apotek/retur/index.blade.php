@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Retur Barang</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">apotek</a></li>
            <li class="active">Retur Barang</li>
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
                        Retur Barang
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
                        <div class="col-md-12">
                            <div class="col-md-12 form-group">
                                <input type="text" id="search" name="search" class="form-control"
                                    placeholder="Search Obat" autocomplete="off" autofocus>
                                <div id="result" class="panel panel-default" style="display:none">
                                    <ul class="list-group" id="memList" style="margin-top: -20px;">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <form action="{{route('retur.store')}}" method="post">
                            @csrf
                            @method('POST')
                            <div class="col-md-12 form-group">

                                @if ($idproduk == 0)
                                <div id="findObat">

                                </div>
                                @else
                                <div class="col-md-6">
                                    <label for="input1" class="form-label">ID Produk</label>
                                    <input type="hidden" class="form-control" name="obatId" readonly
                                        value="{{ $obat->id }}">

                                    <label for="input1" class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control" name="kodeProduk" readonly
                                        value="{{ $obat->kodeProduk }}">

                                    <label for="input1" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="obat" readonly
                                        value="{{ $obat->obat }}">

                                    <label for="input1" class="form-label">Harga</label>
                                    <input type="text" class="form-control" name="hargaJual" readonly
                                        value="{{ $obat->hargaJual }}">

                                    <label for="input1" class="form-label">Stok Produk</label>
                                    <input type="number" class="form-control" readonly value="{{ $obat->jumlah }}">

                                    {{-- <label for="input1" class="form-label">Unit</label> --}}
                                    <input type="hidden" class="form-control" name="unitId" readonly
                                        value="{{ $obat->unitId }}">
                                        
                                </div>

                                <div class="col-md-6">
                                    <label for="input1" class="form-label">Jumlah Produk</label>
                                    <input type="number" min="1" max="{{ $obat->jumlah }}" class="form-control"
                                        name="jumlah">

                                    <label for="input1" class="form-label">Distributor</label>
                                    <input type="text" class="form-control" name="distributor">

                                    <label for="input1" class="form-label">Keterangan</label>
                                    {{-- <input type="number" min="1" max="{{ $obat->jumlah }}" class="form-control"
                                    name="jumlah"> --}}
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="4"
                                        name="keterangan"></textarea>
                                </div>

                                <hr>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-white ">Tambah</button>
                            </div>
                        @endif

                        </form>

                        <table id="dataretur" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Retur Barang</th>
                                    <th>Keterangan</th>
                                    <th>Distributor</th>
                                    <th>Jumlah </th>
                                    <th>Unit</th>
                                    <th>Keterangan</th>
                                    <th>Submit</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($retur as $retur)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $retur->obat }}</td>
                                    <td>{{ $retur->kodeProduk }}</td>
                                    <td>{{ $retur->distributor }}</td>
                                    <td>{{ $retur->jumlah }}</td>
                                    <td>{{ $retur->unit }}</td>
                                    <td>{{ $retur->keterangan }}</td>

                                    <td>
                                        {{-- {{ $user->active }} --}}
                                        @if ($retur->active == 1)
                                        <a class="btn btn-success" data-toggle="modal"
                                            data-target="#myModalNonAktif{{ $retur->id }}" href="">Active</a>
                                        @else
                                        <a class="btn btn-basic" data-toggle="modal"
                                            data-target="#myModalAktif{{ $retur->id }}" href="">Non-Active</a>
                                        @endif

                                        <!-- Modal Aktif akun-->
                                        <form action="{{ route('retur.aktif', $retur->id) }}" method="POST"
                                            class="d-inline" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal fade" id="myModalAktif{{ $retur->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Aktifkan Akun
                                                                {{ $retur->retur }}?</h4>
                                                            {{-- <input type="name" name="active" class="form-control" id="active" value="{{ $user->active }}">
                                                            --}}
                                                            <input type="hidden" name="id" class="form-control" id="id"
                                                                value="{{ $retur->id }}">
                                                            <input type="hidden" name="active" class="form-control"
                                                                id="active" value="1">
                                                        </div>

                                                        <div class="modal-body">
                                                            <button type="button" class="btn btn-flat btn-primary"
                                                                data-dismiss="modal">No</button>
                                                            <button type="submit"
                                                                class="btn btn-flat btn-danger">yes</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Modal Code -->
                                        <!-- Modal NonAktif akun-->
                                        <form action="{{ route('retur.aktif', $retur->id) }}" method="POST"
                                            class="d-inline" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal fade" id="myModalNonAktif{{ $retur->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Non Aktifkan Akun
                                                                {{ $retur->retur }}?</h4>
                                                            {{-- <input type="name" name="active" class="form-control" id="active" value="{{ $user->active }}">
                                                            --}}
                                                            <input type="hidden" name="id" class="form-control" id="id"
                                                                value="{{ $retur->id }}">
                                                            <input type="hidden" name="active" class="form-control"
                                                                id="active" value="2">
                                                        </div>

                                                        <div class="modal-body">
                                                            <button type="button" class="btn btn-flat btn-primary"
                                                                data-dismiss="modal">No</button>
                                                            <button type="submit"
                                                                class="btn btn-flat btn-danger">yes</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- End Modal Code -->
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#myModalHapus{{ $retur->id }}">
                                            <i class="fa fa-eraser"></i>
                                        </a>

                                        <!-- Modal hapus akun-->
                                        <form action="/retur/{{ $retur->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <div class="modal fade" id="myModalHapus{{ $retur->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Hapus Retur Barang?</h4>
                                                            <input type="hidden" class="form-control" id="input1"
                                                            name="obatId" readonly value="{{ $retur->obatId }}">
                                                        <input type="hidden" class="form-control" id="input1"
                                                            name="jumlah" readonly value="{{ $retur->jumlah }}">
                                                        </div>

                                                        <div class="modal-body">
                                                            <button type="button" class="btn btn-flat btn-primary"
                                                                data-dismiss="modal">No</button>
                                                            {{-- <a href="{{ route('retur.destroy', $user->id) }}"
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

                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                    </div>

                </div>
            </div>
            <!-- End Panel -->



            <!-- Modal tambah akun-->
            <form action="{{ route('retur.store') }}" method="post">

                @csrf
                @method('POST')
                <div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Retur Barang</h4>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="input1" class="form-label">Retur Barang</label>
                                    <input type="text" class="form-control" id="input1" name="retur">
                                </div>
                                <div class="form-group">
                                    <label for="input2" class="form-label">Distributor</label>
                                    <input type="text" class="form-control" id="input2" name="distributor">
                                </div>
                                <div class="form-group">
                                    <label for="input2" class="form-label">Keterangan</label>
                                    <input type="text" class="form-control" id="input2" name="keterangan">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End Moda Code -->




        </div>
        <!-- End Row -->
    </div>
    <!-- END CONTAINER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->
    <script>
        $(document).ready(function () {
            $('#dataretur').DataTable();
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
                    $.get("{{ route('retur.search') }}", {
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
