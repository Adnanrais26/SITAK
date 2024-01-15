@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Pengeluaran</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Transaksi</a></li>
            <li class="active">Pengeluaran</li>
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
                        Jenis Pengeluaran
                        <a href="#" class="btn btn-light pull-right" data-toggle="modal" data-target="#myModalTambah">
                            <i class="fa fa-plus-square"></i></a>
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
                                    <th>Tangga Pengeluaran</th>
                                    <th>Pengeluaran</th>
                                    <th>Jenis Pengeluaran</th>
                                    <th>Distributor</th>
                                    <th>Jumlah Dibayar</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
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


                                    <td>
                                        <a href="#" class="btn btn-warning" data-toggle="modal"
                                            data-target="#myModalEdit{{ $pengeluaran->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <!-- Modal edit akun-->
                                        <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}"
                                            method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal fade" id="myModalEdit{{ $pengeluaran->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Edit Pengeluaran</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Tanggal
                                                                    Pengeluaran</label>
                                                                <fieldset>
                                                                    <div class="control-group">
                                                                        <div class="controls">
                                                                            <div class="input-prepend input-group">
                                                                                <span class="input-group-addon"><i
                                                                                        class="fa fa-calendar"></i></span>
                                                                                <input type="text"
                                                                                    id="date-picker{{ $pengeluaran->id }}"
                                                                                    class="form-control"
                                                                                    name="tanggalPengeluaran"
                                                                                    value="{{ $pengeluaran->tanggalPengeluaran }}" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input1"
                                                                    class="form-label">Pengeluaran</label>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="pengeluaran"
                                                                    value="{{ $pengeluaran->pengeluaran }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Jenis Pengeluaran</label>
                                                                <br>
                                                                <select class="selectpicker" name="jenisPengeluaranId">
                                                                    <option
                                                                        value="{{ $pengeluaran->jenisPengeluaranId }}">
                                                                        {{ $pengeluaran->jenisPengeluaran }}</option>
                                                                    {{-- <option value="1">Obat</option>
                                                                    <option value="2">Alat Kesehatan</option>
                                                                    <option value="3">Kosmetik</option> --}}
                                                                    @foreach ($jeniss as $jenis)
                                                                    <option value="{{ $jenis->id }}">
                                                                        {{ $jenis->jenisPengeluaran }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input2"
                                                                    class="form-label">Distributor</label>
                                                                <input type="text" class="form-control" id="input2"
                                                                    name="distributor"
                                                                    value="{{ $pengeluaran->distributor }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="formFile" class="form-label">File <i style="color: rgba(255, 0, 0, 0.507)">(Bisa
                                                                        diksongkan)</i></label>
                                                                <input class="form-control" type="file" id="formFile"
                                                                    name="file">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Jumlah
                                                                    Pembayaran</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">Rp.</div>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputAmount2" name="jumlah"
                                                                        value="{{ $pengeluaran->jumlah }}">
                                                                    {{-- placeholder="Harga Awal"> --}}
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input2"
                                                                    class="form-label">Keterangan</label>
                                                                <input type="text" class="form-control" id="input2"
                                                                    name="keterangan"
                                                                    value="{{ $pengeluaran->keterangan }}">
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit"
                                                                class="btn btn-default">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                        <!-- End Modal Code -->

                                        <a href="#" class="btn btn-danger" data-toggle="modal"
                                            data-target="#myModalHapus{{ $pengeluaran->id }}">
                                            <i class="fa fa-eraser"></i>
                                        </a>

                                        <!-- Modal hapus akun-->
                                        <form action="/pengeluaran/{{ $pengeluaran->id }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <div class="modal fade" id="myModalHapus{{ $pengeluaran->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Hapus Akun Permanen?</h4>
                                                        </div>

                                                        <div class="modal-body">
                                                            <button type="button" class="btn btn-flat btn-primary"
                                                                data-dismiss="modal">No</button>
                                                            {{-- <a href="{{ route('pengeluaran.destroy', $user->id) }}"
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
            <form action="{{ route('pengeluaran.store') }}" method="post" enctype="multipart/form-data">

                @csrf
                @method('POST')
                <div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Pengeluaran</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="input1" class="form-label">Tanggal Pengeluaran</label>
                                    <fieldset>
                                        <div class="control-group">
                                            <div class="controls">
                                                <div class="input-prepend input-group">
                                                    <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span>
                                                    <input type="text" id="date-picker" class="form-control" value=""
                                                        name="tanggalPengeluaran" />
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="form-group">
                                    <label for="input1" class="form-label">Pengeluaran</label>
                                    <input type="text" class="form-control" id="input1" name="pengeluaran">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jenis Pengeluaran</label>
                                    <br>
                                    <select class="selectpicker" name="jenisPengeluaranId">
                                        <option value="">--- Pilih Jenis Obat ---</option>
                                        {{-- <option value="1">Obat</option>
                                        <option value="2">Alat Kesehatan</option>
                                        <option value="3">Kosmetik</option> --}}
                                        @foreach ($jeniss as $jenis)
                                        <option value="{{ $jenis->id }}">
                                            {{ $jenis->jenisPengeluaran }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="input2" class="form-label">Distributor</label>
                                    <input type="text" class="form-control" id="input2" name="distributor">
                                </div>
                                <div class="form-group">
                                    <label for="formFile" class="form-label">File</label>
                                    <input class="form-control" type="file" id="formFile" name="file">
                                </div>
                                <div class="form-group">
                                    <label for="input1" class="form-label">Jumlah Pembayaran</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp.</div>
                                        <input type="text" class="form-control" id="exampleInputAmount2" name="jumlah">
                                        {{-- placeholder="Harga Awal"> --}}
                                    </div>
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
    @foreach ($pengeluarans as $pengeluaran)
    <script>
        var id = {
            {
                $pengeluaran - > id
            }
        };
        $(document).each(function () {
            $('#date-picker' + id).daterangepicker({
                    singleDatePicker: true,
                    format: 'YYYY-MM-DD',
                },
                function (start, end, label) {
                    console.log(start.toISOString(),
                        end.toISOString(),
                        label);
                });
        });

    </script>
    @endforeach

    <script>
        $(document).ready(function () {
            $('#datajenis').DataTable();
        });

    </script>
    <!-- Basic Single Date Picker -->
    <script>
        $(document).ready(function () {
            $('#date-picker').daterangepicker({
                    singleDatePicker: true,
                    format: 'YYYY-MM-DD',
                },
                function (start, end, label) {
                    console.log(start.toISOString(),
                        end.toISOString(),
                        label);
                });
        });

    </script>


    @endsection
