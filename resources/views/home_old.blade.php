@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Selamat Datang,') }} {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="row  justify-content-center">
                        <!-- Card History-->

                        <div class="col-lg-3">

                            <div class="card shadow" style="height:30vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Perencanaan</h6>
                                </div>
                                <div class="card-body perencanaan">
                                    <p>Upload Data Perencanaan</p>
                                    <a href="/upload" class="btn btn-primary">Perencanaan</a>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-3">

                            <div class="card shadow" style="height: 30vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
                                </div>
                                <div class="card-body">
                                    <p>pengumuman 1</p>
                                    <p>pengumuman 2</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row  justify-content-center">
                        <!-- Card History-->
                        <div class="col-lg-3">

                            <div class="card shadow" style="height:30vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Evaluasi</h6>
                                </div>
                                <div class="card-body evaluasi">
                                    <p>Upload Data Evaluasi</p>
                                    <a href="/report" class="btn btn-primary">Evaluasi</a>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-3">

                            <div class="card shadow" style="height: 30vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Download Template</h6>
                                </div>
                                <div class="card-body evaluasi">
                                    <p>Data Template</p>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Download</a>
                                    <!-- Modal -->
                                    <div id="myModal" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <!-- Ini adalah Bagian Header Modal -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Download Template</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Ini adalah Bagian Body Modal -->
                                                <div class="modal-body">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th>File Name</th>
                                                                <th>Download</th>

                                                                {{-- <th >OPSI</th> --}}
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <!-- Isi dari keluaran data -->
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <!-- Ini adalah Bagian Footer Modal -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection