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
<div class="row">
    <div class="col-sm-8">
        <!-- progress -->
        <div class="card shadow overflow-auto" style=" height: 80vh;">
            <div class=" card-header py-3">
                <h6 class="m-0 text-primary">Progres</h6>
            </div>
            <div class="card-body">
                @foreach($projek as $projek)
                <div style="padding-bottom: 16px;">
                    <h6 style="font-weight: 600;">{{$projek->name}}</h6>
                    <h7>{{
                            $users = trim(
                            $user->where('id',$projek->user_id)->pluck('name'),
                            '[""]')
                        }}</h7>
                    <div class="progress" style="height:8px">
                        <div class="progress-bar" role="progressbar" style="width: {{$projek->all_status}}%"></div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>


    </div>
    <!-- col 2 -->
    <div class="col">
        <!-- template -->
        <div class="card shadow" style="height: 30vh">
            <div class="card-header py-3">
                <h6 class="m-0 text-primary">Template Download</h6>
            </div>
            <div class="card-body table-wrapper-scroll-y scrollbar">
                <table>
                    @foreach($file as $f)
                    <tr>
                        <form action="/home/download" method="GET">
                            <input type="hidden" name="path" value=" {{$f->path}}">
                            <td>{{ $f->nama_file }}</td>
                            <td style="width: 10%;">
                                <button type="submit" class="btn">
                                    <i class="menu-icon fa fa-download" style="color: blue;"></i>
                                </button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <!-- pengumuman -->
        <div class="card shadow" style="height: 45vh;" style="overflow-y: auto;">
            <div class="card-header py-3">
                <h6 class="m-0 text-primary">Pengumuman</h6>
            </div>
            <div class="card-body" style="overflow-y: auto;">
                <table style="border: 0;">
                    @foreach($pengumuman as $f)
                    <tr data-toggle="modal" data-target="#pengumumanModal" data-id="{{ $f->id }}" class="detail-btn">
                        <td style="padding-bottom:8px; cursor:pointer" class="text-primary">
                            <a>
                                {{ $f->judul }}
                            </a>
                        </td>
                        <td style="padding-bottom:8px; cursor:pointer; width:20%">
                            <a>
                                {{$date= substr(
                                     $f->created_at ,2,8
                                    )}}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Checklist Monev -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="text-primary">
                    Checklist Laporan Monev
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
                                <table class="table" id="table_bulanan">
                                    <thead>
                                        <tr>
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->bulanan_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
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
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->triwulan_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
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
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->tengahtahun_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
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
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->akhirtahun_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
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
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->destudi_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
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
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->renaksi_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
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
</div>
<!-- End Checklist Monev -->

<!-- Checklist Perencanaan -->
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h3 class="text-primary">
                    Checklist Perencanaan
                </h3>
            </div>
            <div class="row card-body">
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
                                <table class="table" id="table_matriks">
                                    <thead>
                                        <tr>
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->matriks_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- RAB -->
                        <div class="tab-pane fade show " id="rab" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="modal-body">
                                <table class="table" id="table_rab">
                                    <thead>
                                        <tr>
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->rab_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- KAK -->
                        <div class="tab-pane fade show " id="kak" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="modal-body">
                                <table class="table" id="table_kak">
                                    <thead>
                                        <tr>
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->kak_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Proposal -->
                        <div class="tab-pane fade show " id="proposal" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="modal-body">
                                <table class="table" id="table_proposal">
                                    <thead>
                                        <tr>
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->proposal_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Analisis -->
                        <div class="tab-pane fade show " id="analisis" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="modal-body">
                                <table class="table" id="table_analisis">
                                    <thead>
                                        <tr>
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->analisis_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
                                                </td>
                                            </form>
                                        </tr>
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
                                            <th width=5%>No.</th>
                                            <th width=20%>Nama User</th>
                                            <th width=50%>Projek Name</th>
                                            <th width=30% class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($userdata as $f)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name}}</td>
                                                <td>{{ $f->projek_name }}</td>
                                                <td class="text-center">
                                                    @if ($f->renaksi_status==0)
                                                    <div>
                                                        <a style="font-weight: 1000; color:red"><i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                    @else
                                                    <div>
                                                        <a style="font-weight: 1000; color:green"><i class="fa fa-check"></i>
                                                        </a>
                                                    </div>
                                                    @endif
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
</div>

<!-- End of Main Content -->


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
                <h6 id="judul"></h6>
                <br>
                <p id="isi">
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
    jQuery(document).ready(function() {
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
        $('#table_matriks').DataTable({
            "autoWidth": false
        });
        $('#table_rab').DataTable({
            "autoWidth": false
        });
        $('#table_kak').DataTable({
            "autoWidth": false
        });
        $('#table_proposal').DataTable({
            "autoWidth": false
        });
        $('#table_analisis').DataTable({
            "autoWidth": false
        });
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();

        //dynamic modal
        $('.detail-btn').click(function() {
            const id = $(this).attr('data-id');
            console.log(id)
            $.ajax({
                url: '/home/pengumuman/' + id,
                type: 'GET',
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                    $('#judul').html(data.judul);
                    $('#isi').html(data.isi_pengumuman);
                }
            });
        });
    });
</script>

@endsection