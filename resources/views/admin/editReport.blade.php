@extends('admin/main')

@section('title', 'Edit Monev')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Monitoring dan Evaluasi</h1>
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
                                    @foreach ($bulanan as $f)
                                    {{-- @if ($f->user_id == Auth::user()->id) --}}
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $date = substr($f->created_at, 2, 8) }}
                                            </td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <td>{{ $f->name }}</td>
                                            @if ($f->status == 0)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==1)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td class="t">

                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#myModal{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Triwulan -->
                    <div class="tab-pane fade show " id="triwulan" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                    @foreach ($triwulan as $f)
                                    {{-- @if ($f->user_id == Auth::user()->id) --}}
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $date = substr($f->created_at, 2, 8) }}
                                            </td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <td>{{ $f->name }}</td>
                                            @if ($f->status == 0)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==1)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td class="t">

                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#myModal{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Tengah -->
                    <div class="tab-pane fade show " id="tengah" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                    @foreach ($tengahTahun as $f)
                                    {{-- @if ($f->user_id == Auth::user()->id) --}}
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $date = substr($f->created_at, 2, 8) }}
                                            </td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <td>{{ $f->name }}</td>
                                            @if ($f->status == 0)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==1)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td class="t">

                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#myModal{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Akhir -->
                    <div class="tab-pane fade show " id="akhir" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                    @foreach ($akhirTahun as $f)
                                    {{-- @if ($f->user_id == Auth::user()->id) --}}
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $date = substr($f->created_at, 2, 8) }}
                                            </td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <td>{{ $f->name }}</td>
                                            @if ($f->status == 0)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==1)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td class="t">

                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#myModal{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Destudi -->
                    <div class="tab-pane fade show " id="destudi" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                    @foreach ($destudi as $f)
                                    {{-- @if ($f->user_id == Auth::user()->id) --}}
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $date = substr($f->created_at, 2, 8) }}
                                            </td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <td>{{ $f->name }}</td>
                                            @if ($f->status == 0)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==1)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td class="t">

                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#myModal{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Renaksi -->
                    <div class="tab-pane fade show " id="renaksi" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                    @foreach ($renaksi as $f)
                                    {{-- @if ($f->user_id == Auth::user()->id) --}}
                                    <tr>
                                        <form action="/perencanaan/download" method="GET">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $date = substr($f->created_at, 2, 8) }}
                                            </td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <td>{{ $f->name }}</td>
                                            @if ($f->status == 0)
                                            <td>
                                                Menunggu Review
                                            </td>
                                            @elseif($f->status==1)
                                            <td>
                                                Revisi
                                            </td>
                                            @elseif($f->status==2)
                                            <td>
                                                Diterima
                                            </td>
                                            @endif
                                            <td class="t">

                                                <!-- Button trigger modal -->
                                                <a type="submit" class="btn btn-success" style="color:white" data-toggle="modal" data-target="#myModal{{ $f->id }}">
                                                    <i class="menu-icon fa fa-pencil"></i> Ubah Status
                                                </a>

                                                <button type="submit" class="btn btn-primary">
                                                    <i class="menu-icon fa fa-download"></i> Download
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                    {{-- @endif --}}
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bulanan -->
    @foreach ($bulanan as $f)
    <div id="myModal{{ $f->id }}" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Ini adalah Bagian Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Ubah Status</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Ini adalah Bagian Body Modal -->

                <div class="modal-body">
                    <form role="form" method="get" action="{{ url('admin/ubahbulanan/' . $f->id) }}" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nama File</label>
                                <input type="text" name="projek_id" class="form-control" id="exampleInputPassword1" placeholder="{{$f->name}}" readonly>
                            </div>
                            <label for="exampleInputEmail1">Status</label>
                            <select class="custom-select" name="status">
                                <option value="0">Menunggu Review</option>
                                <option value="1">Revisi</option>
                                <option value="2">Diterima</option>
                            </select>
                        </div>

                        <!-- Ini adalah Bagian Footer Modal -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Ubah Status</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal Triwulan -->
        @foreach ($triwulan as $f)
        <div id="myModal{{ $f->id }}" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Ini adalah Bagian Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Status</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Ini adalah Bagian Body Modal -->

                    <div class="modal-body">
                        <div class="mb-3">
                            <a href="/admin/ubahtriwulan/{{ $f->id }}?status=0" class="btn btn-primary">Menunggu
                                Review</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahtriwulan/{{ $f->id }}?status=1" class="btn btn-primary">Revisi</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahtriwulan/{{ $f->id }}?status=2" class="btn btn-primary">Diterima</a>
                        </div>
                    </div>
                </div>
                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal Tengah -->
        @foreach ($tengahTahun as $f)
        <div id="myModal{{ $f->id }}" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Ini adalah Bagian Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Status</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Ini adalah Bagian Body Modal -->

                    <div class="modal-body">
                        <div class="mb-3">
                            <a href="/admin/ubahtengah/{{ $f->id }}?status=0" class="btn btn-primary">Menunggu
                                Review</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahtengah/{{ $f->id }}?status=1" class="btn btn-primary">Revisi</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahtengah/{{ $f->id }}?status=2" class="btn btn-primary">Diterima</a>
                        </div>
                    </div>
                </div>
                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal Akhir -->
        @foreach ($akhirTahun as $f)
        <div id="myModal{{ $f->id }}" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Ini adalah Bagian Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Status</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Ini adalah Bagian Body Modal -->

                    <div class="modal-body">
                        <div class="mb-3">
                            <a href="/admin/ubahakhir/{{ $f->id }}?status=0" class="btn btn-primary">Menunggu
                                Review</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahakhir/{{ $f->id }}?status=1" class="btn btn-primary">Revisi</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahakhir/{{ $f->id }}?status=2" class="btn btn-primary">Diterima</a>
                        </div>
                    </div>
                </div>
                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal Destudi -->
        @foreach ($destudi as $f)
        <div id="myModal{{ $f->id }}" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Ini adalah Bagian Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Status</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Ini adalah Bagian Body Modal -->

                    <div class="modal-body">
                        <div class="mb-3">
                            <a href="/admin/ubahdestudi/{{ $f->id }}?status=0" class="btn btn-primary">Menunggu
                                Review</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahdestudi/{{ $f->id }}?status=1" class="btn btn-primary">Revisi</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahdestudi/{{ $f->id }}?status=2" class="btn btn-primary">Diterima</a>
                        </div>
                    </div>
                </div>
                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal Renaksi -->
        @foreach ($renaksi as $f)
        <div id="myModal{{ $f->id }}" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Ini adalah Bagian Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ubah Status</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Ini adalah Bagian Body Modal -->

                    <div class="modal-body">
                        <div class="mb-3">
                            <a href="/admin/ubahrenaksi/{{ $f->id }}?status=0" class="btn btn-primary">Menunggu
                                Review</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahrenaksi/{{ $f->id }}?status=1" class="btn btn-primary">Revisi</a>
                        </div>
                        <div class="mb-3">
                            <a href="/admin/ubahrenaksi/{{ $f->id }}?status=2" class="btn btn-primary">Diterima</a>
                        </div>
                    </div>
                </div>
                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    {{-- <button type="submit" class="btn btn-primary">Tambah</button> --}}
                </div>
            </div>
        </div>
        @endforeach

    </div>
    @endsection