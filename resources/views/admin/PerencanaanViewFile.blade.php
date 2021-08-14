@extends('admin/main')

@section('title', 'Edit Perencanaan')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Perencanaan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">

    <div>
        <a href="/admin/perencanaan" style="font-weight: 500;"><i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="card card-body">
        <div class="row">
            <div class="col">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" href="#matriks" role="tab" data-toggle="tab">Matriks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#rab" role="tab" data-toggle="tab">RAB</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#kak" role="tab" data-toggle="tab">KAK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#proposal" role="tab" data-toggle="tab">Proposal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#analisis" role="tab" data-toggle="tab">Analisis Resiko</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content" id="nav-tabContent">
                    <!-- Matriks -->
                    <div class="tab-pane fade show active" id="matriks" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=5%>No.</th>
                                        <th>Date Upload</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Status</th>
                                        <th width=30%>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($matriks as $f)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->created_at }}</td>
                                            <td>{{ $f->name }}</td>
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
                                            <td class="float-right">
                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#matriks{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

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
                    </div>
                    <!-- RAB -->
                    <div class="tab-pane fade" id="rab" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="modal-body">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=5%>No.</th>
                                        <th>Date Upload</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Status</th>
                                        <th width=30%>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($rab as $f)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->created_at }}</td>
                                            <td>{{ $f->name }}</td>
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
                                            <td class="float-right">
                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#rab{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

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
                    </div>
                    <!-- KAK -->
                    <div class="tab-pane fade" id="kak" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="modal-body">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=5%>No.</th>
                                        <th>Date Upload</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Status</th>
                                        <th width=30%>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($kak as $f)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->created_at }}</td>
                                            <td>{{ $f->name }}</td>
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
                                            <td class="float-right">
                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#kak{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

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
                    </div>
                    <!-- Proposal -->
                    <div class="tab-pane fade" id="proposal" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="modal-body">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=5%>No.</th>
                                        <th>Date Upload</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Status</th>
                                        <th width=30%>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($proposal as $f)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->created_at }}</td>
                                            <td>{{ $f->name }}</td>
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
                                            <td class="float-right">
                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#proposal{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

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
                    </div>
                    <!-- Analisis -->
                    <div class="tab-pane fade" id="analisis" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="modal-body">
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=5%>No.</th>
                                        <th>Date Upload</th>
                                        <th width=30%>File Name</th>
                                        <th width=20%>Status</th>
                                        <th width=30%>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($analisis as $f)
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <input type="hidden" name="path" value=" {{$f->path}}">
                                            <td>{{ $f->created_at }}</td>
                                            <td>{{ $f->name }}</td>
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
                                            <td class="float-right">
                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#analisis{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection