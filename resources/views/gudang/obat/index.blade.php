@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Obat</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Gudang</a></li>
            <li class="active">Obat</li>
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
                        obat Obat
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

                        <table id="dataobat" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Produk</th>
                                    <th>Obat</th>
                                    <th>Kategori Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Jumlah</th>
                                    <th>Unit</th>
                                    <th>Harga Beli</th>
                                    <th>Harga Jual</th>
                                    <th>Keterangan</th>
                                    <th>Aktif</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($obats as $obat)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $obat->kodeProduk }}</td>
                                    <td>{{ $obat->obat }}</td>
                                    <td>{{ $obat->kategoriObat }}</td>
                                    <td>{{ $obat->jenisObat }}</td>
                                    <td>{{ $obat->jumlah }}</td>
                                    <td>{{ $obat->unit }}</td>
                                    <td>Rp. {{ number_format($obat->hargaBeli,0,',','.') }}</td>
                                    <td>Rp. {{ number_format($obat->hargaJual,0,',','.') }}</td>
                                    <td>{{ Str::limit($obat->keterangan, 50, '...') }}</td>

                                    <td>
                                        {{-- {{ $user->active }} --}}
                                        @if ($obat->active == 1)
                                        <a class="btn btn-success" data-toggle="modal"
                                            data-target="#myModalNonAktif{{ $obat->id }}" href="">Active</a>
                                        @else
                                        <a class="btn btn-basic" data-toggle="modal"
                                            data-target="#myModalAktif{{ $obat->id }}" href="">Non-Active</a>
                                        @endif

                                        <!-- Modal Aktif Obat-->
                                        <form action="{{ route('obat.aktif', $obat->id) }}" method="POST"
                                            class="d-inline" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal fade" id="myModalAktif{{ $obat->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Aktifkan Obat
                                                                {{ $obat->obat }}?</h4>
                                                            {{-- <input type="name" name="active" class="form-control" id="active" value="{{ $user->active }}">
                                                            --}}
                                                            <input type="hidden" name="id" class="form-control" id="id"
                                                                value="{{ $obat->id }}">
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
                                        <!-- Modal NonAktif Obat-->
                                        <form action="{{ route('obat.aktif', $obat->id) }}" method="POST"
                                            class="d-inline" enctype="multipart/form-data">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal fade" id="myModalNonAktif{{ $obat->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Non Aktifkan Obat
                                                                {{ $obat->obat }}?</h4>
                                                            {{-- <input type="name" name="active" class="form-control" id="active" value="{{ $user->active }}">
                                                            --}}
                                                            <input type="hidden" name="id" class="form-control" id="id"
                                                                value="{{ $obat->id }}">
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
                                        <a href="#" class="btn btn-warning" data-toggle="modal"
                                            data-target="#myModalEdit{{ $obat->id }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <!-- Modal edit Obat-->
                                        <form action="{{ route('obat.update', $obat->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal fade" id="myModalEdit{{ $obat->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Edit Obat</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Kode Produk</label>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="kodeProduk" value="{{ $obat->kodeProduk }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Obat</label>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="obat" value="{{ $obat->obat }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Kategori Obat</label>
                                                                <br>
                                                                <select class="selectpicker" name="kategoriObatId">
                                                                    <option name="" value="{{ $obat->kategoriObatId }}">{{ $obat->kategoriObat }}
                                                                    </option> 
                                                                    @foreach ($kategoris as $kategori)
                                                                    <option value="{{ $kategori->id }}">
                                                                        {{ $kategori->kategoriObat }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label">Jenis Obat</label>
                                                                <br>
                                                                <select class="selectpicker" name="jenisObatId">
                                                                    <option name="" value="{{ $obat->jenisObatId }}">{{ $obat->jenisObat }}
                                                                    </option> 
                                                                    @foreach ($jeniss as $jenis)
                                                                    <option value="{{ $jenis->id }}">
                                                                        {{ $jenis->jenisObat }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-inline">
                                                                <label for="input1" class="form-label">Jumlah</label>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="jumlah" value="{{ $obat->jumlah }}">
                                                                <label class="form-label"> Unit</label>
                                                                <select class="selectpicker" name="unitId">
                                                                    <option name="" value="{{ $obat->unitId }}">{{ $obat->unit }}
                                                                    </option> 
                                                                    @foreach ($units as $unit)
                                                                    <option value="{{ $unit->id }}">
                                                                        {{ $unit->unit }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <br>
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Harga Beli</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">Rp.</div>
                                                                    <input type="text" class="form-control" id="exampleInputAmount2" name="hargaBeli" value="{{ $obat->hargaBeli }}">
                                                                        {{-- placeholder="Harga Awal"> --}}
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input1" class="form-label">Harga Jual</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">Rp.</div>
                                                                    <input type="text" class="form-control" id="exampleInputAmount2" name="hargaJual" value="{{ $obat->hargaJual }}">
                                                                        {{-- placeholder="Harga Awal"> --}}
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="input2"
                                                                    class="form-label">keterangan</label>
                                                                <input type="text" class="form-control" id="input2"
                                                                    name="keterangan" value="{{ $obat->keterangan }}">
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
                                            data-target="#myModalHapus{{ $obat->id }}">
                                            <i class="fa fa-eraser"></i>
                                        </a>

                                        <!-- Modal hapus Obat-->
                                        <form action="/obat/{{ $obat->id }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <div class="modal fade" id="myModalHapus{{ $obat->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title">Hapus Obat Permanen?</h4>
                                                        </div>

                                                        <div class="modal-body">
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



            <!-- Modal tambah Obat-->
            <form action="{{ route('obat.store') }}" method="post">

                @csrf
                @method('POST')
                <div class="modal fade" id="myModalTambah" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Obat</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="input1" class="form-label">Kode Produk</label>
                                    {{-- <input type="text" class="form-control" id="input1" name="obat"> --}}
                                    <input type="text" class="form-control" id="input2" name="kodeProduk">

                                </div>
                                <div class="form-group">
                                    <label for="input1" class="form-label">Obat</label>
                                    {{-- <input type="text" class="form-control" id="input1" name="obat"> --}}
                                    <input type="text" class="form-control" id="input2" name="obat">

                                </div>
                                <div class="form-group">
                                    <label class="form-label">Kategori Obat</label>
                                    <br>
                                    <select class="selectpicker" name="kategoriObatId">
                                        <option name="" value="">--- Pilih Kategori Obat ---</option>
                                        @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">
                                            {{ $kategori->kategoriObat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jenis Obat</label>
                                    <br>
                                    <select class="selectpicker" name="jenisObatId">
                                        <option name="" value="">--- Pilih Jenis Obat ---</option>
                                        @foreach ($jeniss as $jenis)
                                        <option value="{{ $jenis->id }}">
                                            {{ $jenis->jenisObat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="form-inline">
                                    <label for="input1" class="form-label">Jumlah</label>
                                    <input type="text" class="form-control" id="input1" name="jumlah">
                                    <label class="form-label"> Unit</label>
                                    <select class="selectpicker" name="unitId">
                                        <option name="" value="">--- Pilih Unit ---</option>
                                        @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}">
                                            {{ $unit->unit }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="input1" class="form-label">Harga Beli</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp.</div>
                                        <input type="text" class="form-control" id="exampleInputAmount2" name="hargaBeli">
                                            {{-- placeholder="Harga Awal"> --}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input1" class="form-label">Harga Jual</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">Rp.</div>
                                        <input type="text" class="form-control" id="exampleInputAmount2" name="hargaJual">
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
    
    <script>
        $(document).ready(function () {
            $('#dataobat').DataTable();
        });

    </script>


    @endsection
