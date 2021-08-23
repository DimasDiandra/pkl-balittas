@extends('main')

@section('title', 'Report')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Monitoring dan Evaluasi</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-flag"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
@if (session('success'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
    </button>
    <span>
        {{session('success')}}
</div>
@endif
<!-- Begin Page Content -->
<div class="container-fluid">
    <form action="/report/upload" method="POST" enctype="multipart/form-data">
        <!-- Page Heading -->
        <div>
            <select class="custom-select" name="projek_id">
                @foreach($projek as $projek)
                @if($projek->user_id==Auth::user()->id)
                <option value="{{$projek->id}}">{{$projek->name}}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="row" style="padding-bottom:16px">


            <!-- Card Status-->

            <div class="col-sm-4">

                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0  text-primary">Status Monev</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width=60%>File Name</th>
                                    <th width=40%>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bulanan->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        Bulanan
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        Menunggu Review
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach

                                @foreach($triwulan->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        Triwulan
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        Menunggu Review
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach
                                @foreach($tengahTahun->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        Tengah Tahun
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        Menunggu Review
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach

                                @foreach($akhirTahun->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        Akhir Tahun
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        Menunggu Review
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach

                                @foreach($renaksi->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        Renaksi
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        <span href="">Menunggu Review</span>
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach

                                @foreach($destudi->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        Destudi
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        <span href="">Menunggu Review</span>
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <!-- Card Upload-->
            <div class="col">

                <div class="card shadow mb-4" style="height: 100%;">
                    <div class="card-header py-3">
                        <h6 class="m-0 text-primary">Upload Monitoring dan Evaluasi</h6>
                    </div>
                    <div class="card-body">
                        {{ csrf_field() }}
                        <div class="drop-zone">
                            <span class="drop-zone__prompt"> Drop File Here or Click to Upload</span>
                            <input type="file" name="file" class="drop-zone__input">
                        </div>
                        <div style="margin-top: 10px">
                            <select class="custom-select" name="keterangan">
                                <option selected value="Kosong">Jenis File</option>
                                <option value="1">Laporan Bulanan</option>
                                <option value="2">Laporan Triwulan</option>
                                <option value="3">Laporan Tengah Tahun</option>
                                <option value="4">Laporan Akhir Tahun</option>
                                <option value="5">Laporan Destudi</option>
                                <option value="6">Laporan Renaksi</option>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary" style="float:right; margin-top: 10px;" type="submit"> <i class="menu-icon fa fa-upload"></i> Upload</button>
                        </div>
                    </div>
                </div>

            </div>
            <!-- End Of Card Upload -->
        </div>
    </form>

    <!-- Card History-->
    <div class="card card-body">
        <div class="row">
            <div class="col">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" href="#bulanan" role="tab" data-toggle="tab">Laporan Bulanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#triwulan" role="tab" data-toggle="tab">Laporan Triwulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#tengah" role="tab" data-toggle="tab">Laporan Tengah Tahun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#akhir" role="tab" data-toggle="tab">Laporan Akhir Tahun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#destudi" role="tab" data-toggle="tab">Laporan Destudi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#renaksi" role="tab" data-toggle="tab">Laporan Renaksi</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Bulanan -->
                    <div class="tab-pane fade show active" id="bulanan" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table_bulanan">
                                <thead>
                                    <tr>
                                        <th width=10%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($bulanan as $f)
                                    @if($f->user_id==Auth::user()->id)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->name }}</td>
                                            <td>{{ $f->created_at }}</td>
                                            @if ($f->status==1)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==3)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td>
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Triwulan -->
                    <div class="tab-pane fade show " id="triwulan" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table_triwulan">
                                <thead>
                                    <tr>
                                        <th width=10%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($triwulan as $f)
                                    @if($f->user_id==Auth::user()->id)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->name }}</td>
                                            <td>{{ $f->created_at }}</td>
                                            @if ($f->status==1)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==3)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td>
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Tengah -->
                    <div class="tab-pane fade show " id="tengah" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table_tengah">
                                <thead>
                                    <tr>
                                        <th width=10%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($tengahTahun as $f)
                                    @if($f->user_id==Auth::user()->id)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->name }}</td>
                                            <td>{{ $f->created_at }}</td>
                                            @if ($f->status==1)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==3)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td>
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Akhir -->
                    <div class="tab-pane fade show " id="akhir" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table_akhir">
                                <thead>
                                    <tr>
                                        <th width=10%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($akhirTahun as $f)
                                    @if($f->user_id==Auth::user()->id)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->name }}</td>
                                            <td>{{ $f->created_at }}</td>
                                            @if ($f->status==1)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==3)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td>
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Destudi -->
                    <div class="tab-pane fade show " id="destudi" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table_destudi">
                                <thead>
                                    <tr>
                                        <th width=10%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($destudi as $f)
                                    @if($f->user_id==Auth::user()->id)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->name }}</td>
                                            <td>{{ $f->created_at }}</td>
                                            @if ($f->status==1)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==3)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td>
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Renaksi -->
                    <div class="tab-pane fade show " id="renaksi" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table_renaksi">
                                <thead>
                                    <tr>
                                        <th width=10%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($renaksi as $f)
                                    @if($f->user_id==Auth::user()->id)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->name }}</td>
                                            <td>{{ $f->created_at }}</td>
                                            @if ($f->status==1)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==3)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td>
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function() {
        // Pengumuman
        $('.custom-select').change(function() {
            const id = document.getElementById("projek_id").value;
            console.log(id)
            $.ajax({
                url: 'perencanaan_status/' + id,
                type: 'GET',
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);

                    if (data.matriks_status == 1)
                        $('#statusMatriks').html("Menunggu Review");
                    else if (data.matriks_status == 2)
                        $('#statusMatriks').html("Revisi");
                    else if (data.matriks_status == 3)
                        $('#statusMatriks').html("Diterima");
                    else
                        $('#statusMatriks').html("Kosong");

                    if (data.rab_status == 1)
                        $('#statusRAB').html("Menunggu Review");
                    else if (data.rab_status == 2)
                        $('#statusRAB').html("Revisi");
                    else if (data.rab_status == 3)
                        $('#statusRAB').html("Diterima");
                    else
                        $('#statusRAB').html("Kosong");

                    if (data.kak_status == 1)
                        $('#statusKAK').html("Menunggu Review");
                    else if (data.kak_status == 2)
                        $('#statusKAK').html("Revisi");
                    else if (data.kak_status == 3)
                        $('#statusKAK').html("Diterima");
                    else
                        $('#statusKAK').html("Kosong");

                    if (data.proposal_status == 1)
                        $('#statusProposal').html("Menunggu Review");
                    else if (data.proposal_status == 2)
                        $('#statusProposal').html("Revisi");
                    else if (data.proposal_status == 3)
                        $('#statusProposal').html("Diterima");
                    else
                        $('#statusProposal').html("Kosong");

                    if (data.analisis_status == 1)
                        $('#statusAnalisis').html("Menunggu Review");
                    else if (data.analisis_status == 2)
                        $('#statusAnalisis').html("Revisi");
                    else if (data.analisis_status == 3)
                        $('#statusAnalisis').html("Diterima");
                    else
                        $('#statusAnalisis').html("Kosong");

                }
            });
        });

        // DataTables


        $('#table_bulanan').DataTable({
            "autoWidth": false
        });
        $('#table_triwulan').DataTable({
            "autoWidth": false
        });
        $('#table_tengah').DataTable({
            "autoWidth": false
        });
        $('#table_akhir').DataTable({
            "autoWidth": false
        });
        $('#table_renaksi').DataTable({
            "autoWidth": false
        });
        $('#table_destudi').DataTable({
            "autoWidth": false
        });
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();

        // Sidebar Active
        $(".nav a").on("click", function() {
            $(".nav a").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>

@endsection