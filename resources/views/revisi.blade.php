@extends('main')

@section('title', 'Revisi Anggaran')

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
<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span>
            {{session('success')}}
    </div>
    @endif
    <form action="/revisi/upload" method="POST" enctype="multipart/form-data">
        <div>
            <select class="custom-select" name="projek_id" id="projek_id">
                @foreach($projek->where('user_id',Auth::user()->id) as $projek)
                <option value="{{$projek->id}}">{{$projek->name}}</option>
                @endforeach
            </select>
        </div>
    <div class="row" style="padding-bottom:16px">
        <!-- Card Status-->

        <div class="col-sm-4">

            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Status Revisi Anggaran</h6>
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
                            @foreach($semula_menjadi->where('user_id', Auth::user()->id) as $f)
                            @if($loop->first)
                            <tr>
                                <td>
                                    Semula Menjadi
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

                            @foreach($revisi_rab->where('user_id', Auth::user()->id) as $f)
                            @if($loop->first)
                            <tr>
                                <td>
                                    Revisi RAB
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
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- Card Upload-->
        <div class="col-sm-8">

            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Kelengkapan Document</h6>
                </div>
                <div class="card-body">

                    {{ csrf_field() }}
                    <div class=" table table-borderless">
                        <table>
                            <tr>
                                <td width="50%">
                                    <a>File Semula Menjadi </a><label style="color:red">*</label>
                                </td>
                                <td>
                                    <input type="file" name="semula_menjadi">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <a>File Revisi RAB </a><label style="color:red">*</label>
                                </td>
                                <td>
                                    <input type="file" name="revisi_rab">
                                </td>
                            </tr>                            
                        </table>
                    </div>
                    <div>
                        <a>Keterangan : <label style="color:red">*</label> Kolom Wajib Diisi </a>
                    </div>
                    <div style="position: absolute; bottom: 16px;">
                        <button type="submit" class="btn btn-primary upload"><i class="menu-icon fa fa-upload"></i> Upload</button>
                    </div>
                </div>
            </div>
        </div>      
    </div>
<!-- End Of Card Upload -->

    <!-- Card History -->
    <div class="card card-body">
        <div class="row">
            <div class="col">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" href="#semula_menjadi" role="tab" data-toggle="tab">FM Semula Menjadi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#revisi_rab" role="tab" data-toggle="tab">Revisi RAB</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Semula Menjadi -->
                    <div class="tab-pane fade show active" id="semula_menjadi" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table_semula_menjadi">
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
                                    @foreach($semula_menjadi as $f)
                                    <tr>
                                        <form action="/revisi/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->name }}</td>
                                            <td>{{ $f->created_at }}</td>
                                            <td>
                                                @if ($f->status==1)
                                                Menunggu Review
                                                @elseif($f->status==2)
                                                Revisi
                                                @elseif($f->status==3)
                                                Diterima
                                                @endif
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- RAB -->
                    <div class="tab-pane fade" id="revisi_rab" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="modal-body">
                            <table class="table" id="table_revisi_rab">
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
                                    @foreach($revisi_rab as $f)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->name }}</td>
                                            <td>{{ $f->created_at }}</td>
                                            <td>
                                                @if ($f->status==1)
                                                Menunggu Review
                                                @elseif($f->status==2)
                                                Revisi
                                                @elseif($f->status==3)
                                                Diterima
                                                @endif
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-primary float-right">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
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
    $('#table_semula_menjadi').DataTable({
            "autoWidth": false
        });
        $('#table_revisi_rab').DataTable({
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