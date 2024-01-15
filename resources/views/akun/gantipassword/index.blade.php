@extends('layouts.main')

@section('contents')

<div class="content">

    <!-- Start Page Header -->
    <div class="page-header">
        <h1 class="title">Ganti Password</h1>
        <ol class="breadcrumb">
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">Akun</a></li>
            <li class="active">Ganti Password</li>
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
                    <div class="panel-body">
                        <form action="{{ route('gantipassword.update', $user_id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="example3" class="form-label">Password</label>
                                <input type="text" class="form-control form-control-line" id="example3" name="password">
                            </div>
                            <div class="form-group">
                                <label for="example3" class="form-label">Re-Password</label>
                                <input type="text" class="form-control form-control-line" id="example3"
                                    name="repassword">
                            </div>

                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>

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
