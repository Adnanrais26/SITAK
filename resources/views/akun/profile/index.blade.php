@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Profile</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Akun</a></li>
            <li class="active">Profile</li>
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
                        Profile
                        @foreach ($users as $user)

                        {{-- <a href="#" class="btn btn-light pull-right" data-toggle="modal" data-target="#myModalEdit{{ $user->id }}">
                            <i class="fa fa-edit"></i></a> --}}
                    </div>
                    
                    <div class="panel-body">
                        <!-- Modal edit akun-->
                        {{-- <form action="{{ route('daftarakun.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal fade" id="myModalEdit{{ $user->id }}" tabindex="-1"
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
                                                <label for="input1" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="input1"
                                                    name="nama" value="{{ $user->nama }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="input2" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="input2"
                                                    name="username" value="{{ $user->username }}">
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
                        </form> --}}
                        <form>
                            <div class="form-group">
                                <label for="example3" class="form-label">Name</label>
                                <input type="text" class="form-control form-control-line" id="example3"
                                    value=" {{ $user->nama }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="example4" class="form-label">Username</label>
                                <input type="text" class="form-control form-control-line" id="example4"
                                    value=" {{ $user->username }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="example4" class="form-label">Created At</label>
                                <input type="text" class="form-control form-control-line" id="example4"
                                    value=" {{ $user->created_at }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="example4" class="form-label">Status</label>

                                @if ($user->active == 1)
                                <input type="text" class="form-control form-control-line" id="example4" value=" Aktif"
                                    readonly>
                                @else
                                <input type="text" class="form-control form-control-line" id="example4"
                                    value=" Non-Aktif" readonly>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="example4" class="form-label">Role</label>
                                <input type="text" class="form-control form-control-line" id="example4"
                                    value=" {{ $user->role_name }}" readonly>
                            </div>
                            {{-- <button type="submit" class="btn btn-default">Submit</button> --}}
                        </form>
                        @endforeach

                    </div>


                </div>
            </div>
            <!-- End Panel -->
        </div>
        <!-- End Row -->
    </div>
    <!-- END CONTAINER -->
    <!-- //////////////////////////////////////////////////////////////////////////// -->



    @endsection
