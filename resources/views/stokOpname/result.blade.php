@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Stok Opname Riwayat</h1>
        <ol class="breadcrumb">
            @php
                $role= auth()->user()->role_id;
            @endphp
            @if ($role == 1)
            <li><a href="{{ asset('/dashboard') }}">Dashboard</a></li>
            <li><a href="{{ asset('/stokOpname') }}">Stok Opname</a></li>
            @elseif($role == 3)
            <li><a href="{{ asset('/pemdashboard') }}">Dashboard</a></li>
            <li><a href="{{ asset('/pemstokOpname') }}">Stok Opname</a></li>


            @endif
            <li class="active">Riwayat</li>
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
                        Stok Opname Riwayat {{$tahun}}
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

                        <table id="dataobat" class="table display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kode Produk</th>
                                    <th>Obat</th>
                                    <th>Jumlah Tercatat</th>
                                    <th>Jumlah Sebenarnya</th>
                                    <th>Selisih</th>
                                    <th>Unit</th>
                                    <th>Harga Beli</th>
                                    <th>Keterangan</th>
                                    <th>User</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $a = 0;   
                                @endphp
                                @foreach ($obatsStok as $obat)
                                <tr>
                                    <td>{{ ++$a }}</td>
                                    <td>{{ $obat->created_at }}</td>
                                    <td>{{ $obat->ObatKodeProduk }}</td>
                                    <td>{{ $obat->obat }}</td>
                                    {{-- <td>{{ $obat->jumlah }}</td> --}}
                                    <td>{{ $obat->jumlahTercatat }}</td>
                                    <td>{{ $obat->jumlahSebenarnya }}</td>
                                    @php
                                        $awal= $obat->jumlahTercatat;
                                        $akhir= $obat->jumlahSebenarnya;
                                        $selisih = $akhir-$awal;
                                    @endphp
                                    <td>{{$selisih}}</td>
                                    <td>{{ $obat->unit }}</td>
                                    <td>Rp. {{ number_format($obat->hargaBeli,0,',','.') }}</td>
                                    <td>{{$obat->keterangan}}</td>
                                    <td>{{$obat->nama}}</td>
                                    <td>
                                        <a href="#" class="btn btn-warning" data-toggle="modal"
                                            data-target="#myModalEditData{{ $obat->stokId }}">
                                            <i class="fa fa-edit"></i>
                                        </a>

                                        <!-- Modal edit Obat-->
                                        <form action="{{ route('stokOpname.update', $obat->stokId ) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal fade" id="myModalEditData{{ $obat->stokId }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content col-md-12">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close"><span
                                                                    aria-hidden="true">&times;</span></button>
                                                            <br>
                                                        </div>
                                                        <div class="modal-header text-center">
                                                            <div class="list">
                                                                <div class="row">
                                                                    <h4 class="modal-title ">Edit Stok Opname {{$bulan}}
                                                                        {{$tahun}}</h4>
                                                                    <label>Apotek Keluarga</label>
                                                                    <p> Jl. Pembangunan Perumahan Bumi Jaya Asri RT.02 /
                                                                        RW.11
                                                                        Ds.
                                                                        Jayawaras Kec. Tarogong Kidul Kab. Garut. </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body col-md-12">
                                                            <div class="form-group col-md-6">
                                                                <input type="hidden" class="form-control" id="input1"
                                                                    name="stokId" value="{{ $obat->stokId }}" readonly>
                                                                <input type="hidden" class="form-control" id="input1"
                                                                    name="userId" value="{{ $user_id }}" readonly>
                                                                <input type="hidden" class="form-control" id="input1"
                                                                    name="obatId" value="{{ $obat->obatObatId }}"
                                                                    readonly>
                                                                <label for="input1" class="form-label">Kode
                                                                    Produk</label>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="kodeProduk"
                                                                    value="{{ $obat->ObatKodeProduk }}" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="input1" class="form-label">Nama Produk
                                                                    Produk</label>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="obat" value="{{ $obat->obat }}" readonly>
                                                            </div>

                                                            <div class="form-group col-md-6">
                                                                <label for="input1" class="form-label">Harga
                                                                    Awal</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">Rp.</div>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputAmount2" name="hargaBeli"
                                                                        value="{{ $obat->hargaBeli }}" readonly>
                                                                    {{-- placeholder="Harga Awal"> --}}
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="input1" class="form-label">Harga
                                                                    Jual</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">Rp.</div>
                                                                    <input type="text" class="form-control"
                                                                        id="exampleInputAmount2" name="hargaJual"
                                                                        value="{{ $obat->ObatHargaJual }}" readonly>
                                                                    {{-- placeholder="Harga Awal"> --}}
                                                                </div>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="input1" class="form-label">Jumlah
                                                                    Tercatat</label>
                                                                <input type="number" class="form-control" id="input1"
                                                                    name="jumlahTercatat" value="{{ $obat->jumlah }}"
                                                                    readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="form-label"> Unit</label>
                                                                <input type="hidden" class="form-control" id="input1"
                                                                    name="unitId" value="{{ $obat->ObatUnitId }}"
                                                                    readonly>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="unit" value="{{ $obat->unit }}" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="input1" class="form-label">Jumlah
                                                                    Terbaru</label>
                                                                <input type="number" class="form-control" id="input1"
                                                                    name="jumlahSebenarnya"
                                                                    value="{{ $obat->jumlahSebenarnya }}" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="form-label"> Unit</label>
                                                                <input type="text" class="form-control" id="input1"
                                                                    name="unit" value="{{ $obat->unit }}" readonly>
                                                            </div>
                                                            <div class="form-group col-md-12">
                                                                <label class="form-label"> keterangan</label>
                                                                <textarea class="form-control" name="keterangan"
                                                                    id="exampleFormControlTextarea1" rows="3"
                                                                    required>{{ $obat->keterangan }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer col-md-12">
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
        $(document).ready(function () {
            $('#dataobat').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>

    @endsection
