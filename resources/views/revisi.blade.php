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
        <div class="col">
            
            <div class="card shadow mb-4" style="height: 100%;">
                <div class="card-header py-3">
                    <h6 class="m-0 text-primary">Upload Revisi Anggaran</h6>
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
                                <option value="1">Formula Semula Menjadi</option>
                                <option value="2">Revisi RAB</option>
                            </select>
                        </div>
                        <div>
                            <button class="btn btn-primary" style="float:right; margin-top: 10px;" type="submit"> <i class="menu-icon fa fa-upload"></i> Upload
                            </button>
                        </div>
                    
                </div>
            </form>
            </div>

        </div>
        <!-- End Of Card Upload -->

      
    </div>

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
    $('#reportTable').DataTable();
</script>
@endsection