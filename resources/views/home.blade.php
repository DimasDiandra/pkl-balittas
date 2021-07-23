@extends('main')

@section('title', 'Home')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Home</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-home"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid" style="padding-top: 16px;">
    <div class="row">
        <!-- progres -->
        <div class="col-sm-8">
            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0 text-primary">Progres</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <h4>PlaceHolder Projek</h4>
                                <h6>PlaceHolder User</h6>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="progress">
                                    <div class="progress-bar w-75" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- col 2 -->
        <div class="col">
            <!-- template -->
            <div class="card order-card shadow" style="margin-bottom: 32px;">
                <div class="card-block bg-primary">
                    <a href="#" class="stretched-link" data-toggle="modal" data-target="#myModal">
                        <h4 class="m-b-20 white">Download Template <i class="fa fa-file float-right"></i></h4>
                    </a>
                </div>
            </div>
            <!-- pengumuman -->
            <div class="card shadow" style="height: 60vh; ">
                <div class="card-header py-3">
                    <h6 class="m-0 text-primary">Pengumuman</h6>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        @foreach($pengumuman as $f)
                        <tr>
                            <td>
                                <a href="" data-toggle="modal" data-target="#pengumumanModal">
                                    {{ $f->judul }}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Modal Download -->
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
                <table class="table table-bordered table-striped" id="templateTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>File Name</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi dari keluaran data -->
                        @foreach($file as $f)
                        <tr>
                            <form action="/home/download" method="GET">
                                <td>{{ $loop->iteration }}</td>
                                <input type="hidden" name="path" value=" {{$f->path}}">
                                <td>{{ $f->nama_file }}</td>
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

<!-- Modal Pengumuman -->
<div id="pengumumanModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Ini adalah Bagian Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Pengumuman</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Ini adalah Bagian Body Modal -->
            <div class="modal-body">
                <h6>$pengumuman</h6>
                <br>
                <p>
                    test
                </p>
            </div>

            <!-- Ini adalah Bagian Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>

<script>
    $('#templateTable').DataTable();
</script>

@endsection