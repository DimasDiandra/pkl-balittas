@extends('main')

@section('title', 'Perencanaan')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Perencanaan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-map"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid" style="padding-top: 16px;">

    <div class="row" style="padding-bottom: 16px;">
        <!-- Card Laporan-->

        <div class="col-sm-4">

            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Laporan</h6>
                </div>
                <div class="card-body">
                    <p>nama user upload 1
                    </p>
                </div>

            </div>

        </div>
        <!-- End Of Card Laporan -->

        <!-- Card Upload-->
        <div class="col-sm-5">

            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Kelengkapan Document</h6>
                </div>
                <div class="card-body">

                    <form action="/perencanaan/proses" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- <input type="hidden" name="matriks" value="NULL"> -->
                        <div class="form-group">
                            <b>File Matriks</b><br />
                            <input type="file" name="matriks">
                        </div>
                        <!-- <input type="hidden" name="rab" value="NULL"> -->
                        <div class="form-group">
                            <b>File RAB</b><br />
                            <input type="file" name="rab">
                        </div>
                        <!-- <input type="hidden" name="kak" value="NULL"> -->
                        <div class="form-group">
                            <b>File KAK</b><br />
                            <input type="file" name="kak">
                        </div>
                        <!-- <input type="hidden" name="proposal" value="NULL"> -->
                        <div class="form-group">
                            <b>File Proposal</b><br />
                            <input type="file" name="proposal">
                        </div>
                        <!-- <input type="hidden" name="analisis" value="NULL"> -->
                        <div class="form-group">
                            <b>File Analisis Resiko</b><br />
                            <input type="file" name="analisis">
                        </div>

                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

        <!-- Card Revisi-->
        <div class="col-sm-3">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Ajukan Revisi</h6>
                </div>
                <div class="card-body">
                    <a href="/revisi" class="btn btn-primary">Ajukan Revisi</a>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <!-- Card History-->
        <div class="col">
            <div class="card shadow history-perencanaan">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">History Perencanaan</h6>
                </div>
                <div class="row" style="padding-top: 16px; padding-right:16px; padding-left: 16px;">
                    <!-- button matriks -->
                    <div class="col">
                        <div class="card order-card shadow">
                            <div class="card-block">
                                <a href="#" class="stretched-link" data-toggle="modal" data-target="#matrikscard">
                                    <h4 class="m-b-20">File Matriks</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- button RAB -->
                    <div class="col">
                        <div class="card order-card shadow">
                            <div class="card-block">
                                <a href="#" class="stretched-link" data-toggle="modal" data-target="#rabcard">
                                    <h4 class="m-b-20">File RAB</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- button KAK -->
                    <div class="col">
                        <div class="card order-card shadow">
                            <div class="card-block">
                                <a href="#" class="stretched-link" data-toggle="modal" data-target="#kakcard">
                                    <h4 class="m-b-20">File KAK</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- button Proposal -->
                    <div class="col">
                        <div class="card order-card shadow">
                            <div class="card-block">
                                <a href="#" class="stretched-link" data-toggle="modal" data-target="#procard">
                                    <h4 class="m-b-20">File Proposal</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- button Analisa -->
                    <div class="col">
                        <div class="card order-card shadow">
                            <div class="card-block">
                                <a href="#" class="stretched-link" data-toggle="modal" data-target="#anacard">
                                    <h4 class="m-b-20">File Analisa</h4>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <!-- Matriks -->
    <div id="matrikscard" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Ini adalah Bagian Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Download Template</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Ini adalah Bagian Body Modal -->
                <div class="modal-body">
                    <table class="table" id="matriksTable">
                        <thead>
                            <tr>
                                <th width=10%>No.</th>
                                <th width=70%>File Name</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Isi dari keluaran data -->
                            @foreach($matriks as $f)
                            <tr>
                                <form action="/perencanaan/download" method="GET">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $f->file }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="menu-icon fa fa-download"></i> Download
                                        </button>
                                    </td>
                                </form>
                            </tr>
                            @endforeach
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

    <script>
        $('#matriksTable').DataTable();
    </script>


    @endsection