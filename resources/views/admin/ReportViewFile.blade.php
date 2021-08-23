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
@if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span>
            {{session('success')}}
    </div>
    @endif
<div class="container-fluid">
    <div>
        <a href="./" style="font-weight: 500;"><i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="text-primary">
                Data File {{$user->name}}
            </h3>
        </div>
        <div class="row card-body">
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
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach ($bulanan as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}
                                        </td>
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
                                        <td>
                                            <form action="bulanan/{{$f->id}}" method="GET">
                                                <input type="hidden" value="bulanan" name="jenis">
                                                <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="bulanan/{{$f->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
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
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach ($triwulan as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}
                                        </td>
                                        <input type="hidden" name="path" value=" {{ $f->path }}">
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
                                        <td>
                                            <form action="triwulan/{{$f->id}}" method="GET">
                                                <input type="hidden" value="triwulan" name="jenis">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="triwulan/{{$f->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
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
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach ($tengahTahun as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}
                                        </td>
                                        <input type="hidden" name="path" value=" {{ $f->path }}">
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
                                        <td>
                                            <form action="tengah/{{$f->id}}" method="GET">
                                                <input type="hidden" value="tengah" name="jenis">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="tengah/{{$f->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
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
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach ($akhirTahun as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}
                                        </td>
                                        <input type="hidden" name="path" value=" {{ $f->path }}">
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
                                        <td>
                                            <form action="akhir/{{$f->id}}" method="GET">
                                                <input type="hidden" value="akhir" name="jenis">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="akhir/{{$f->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
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
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach ($destudi as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}
                                        </td>
                                        <input type="hidden" name="path" value=" {{ $f->path }}">
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
                                        <td>
                                            <form action="destudi/{{$f->id}}" method="GET">
                                                <input type="hidden" value="destudi" name="jenis">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="destudi/{{$f->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                            </form>
                                        </td>
                                    </tr>
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
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach ($renaksi as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}
                                        </td>
                                        <input type="hidden" name="path" value=" {{ $f->path }}">
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
                                        <td>
                                            <form action="renaksi/{{$f->id}}" method="GET">
                                                <input type="hidden" value="renaksi" name="jenis">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="renaksi/{{$f->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                            </form>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                            </form>
                                        </td>
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
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#table').DataTable();
    } );
    
    </script>
@endsection