@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Jenis Pengeluaran</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Gudang</a></li>
            <li class="active">Jenis Pengeluaran</li>
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
                                    <th>Jenis Pengeluaran</th>
                                    <th>Keterangan</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis as $jenis)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $jenis->jenisPengeluaran }}</td>
                                    <td>{{ $jenis->keterangan }}</td>

                                    <td>
                                        {{-- {{ $user->active }} --}}
                                        @if ($jenis->active == 1)
                                        <a class="btn btn-success" data-toggle="modal"
                                            data-target="#myModalNonAktif{{ $jenis->id }}" href="">Active</a>
                                        @else
                                        <a class="btn btn-basic" data-toggle="modal"
                                            data-target="#myModalAktif{{ $jenis->id }}" href="">Non-Active</a>
                                        @endif

                                        <!-- Modal Aktif akun-->
                                        <form action="{{ route('jenisPengeluaran.aktif', $jenis->id) }}" method="POST"
                                            class="d-inline" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal fade" id="myModalAktif{{ $jenis->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Aktifkan Akun
                                                                {{ $jenis->jenisPengeluaran }}?</h4>
                                                            {{-- <input type="name" name="active" class="form-control" id="active" value="{{ $user->active }}">
                                                            --}}
                                                            <input type="hidden" name="id" class="form-control" id="id"
                                                                value="{{ $jenis->id }}">
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
                                        <form action="{{ route('jenisPengeluaran.aktif', $jenis->id) }}" method="POST"
                                            class="d-inline" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal fade" id="myModalNonAktif{{ $jenis->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Non Aktifkan Akun
                                                                {{ $jenis->jenisPengeluaran }}?</h4>
                                                            {{-- <input type="name" name="active" class="form-control" id="active" value="{{ $user->active }}">
                                                            --}}
                                                            <input type="hidden" name="id" class="form-control" id="id"
                                                                value="{{ $jenis->id }}">
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
                                        @if ($jenis->id == 1)
                                            
                                        @else
                                        <a href="#" class="btn btn-warning" data-toggle="modal"
                                        data-target="#myModalEdit{{ $jenis->id }}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <!-- Modal edit akun-->
                                    <form action="{{ route('jenisPengeluaran.update', $jenis->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal fade" id="myModalEdit{{ $jenis->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close"><span
                                                                aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">Edit Akun</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="input1" class="form-label">jenis
                                                                Obat</label>
                                                            <input type="text" class="form-control" id="input1"
                                                                name="jenisPengeluaran" value="{{ $jenis->jenisPengeluaran }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="input2"
                                                                class="form-label">keterangan</label>
                                                            <input type="text" class="form-control" id="input2"
                                                                name="keterangan" value="{{ $jenis->keterangan }}">
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
                                        data-target="#myModalHapus{{ $jenis->id }}">
                                        <i class="fa fa-eraser"></i>
                                    </a>

                                    <!-- Modal hapus akun-->
                                    <form action="/jenisPengeluaran/{{ $jenis->id }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <div class="modal fade" id="myModalHapus{{ $jenis->id }}" tabindex="-1"
                                            role="dialog" aria-hidden="true">
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
                                                        {{-- <a href="{{ route('jenisPengeluaran.destroy', $user->id) }}"
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
                                        @endif
                                        
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
            <form action="{{ route('jenisPengeluaran.store') }}" method="post">

                @csrf
                @method('POST')
                <div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Akun</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="input1" class="form-label">Jenis Pengeluaran</label>
                                    <input type="text" class="form-control" id="input1" name="jenisPengeluaran">
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
            $('#datajenis').DataTable();
        });

    </script>


    @endsection
