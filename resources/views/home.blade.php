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
        <div class="card shadow" style="height: 45vh;">
            <div class="card-header py-3">
                <h6 class="m-0 text-primary">Pengumuman</h6>
            </div>
            <div class="card-body">
                <table style="border: 0;">
                    @foreach($pengumuman as $f)
                    <tr data-toggle="modal" data-target="#pengumumanModal" data-id="{{ $f->id }}" class="detail-btn">
                        <td style="padding-bottom:8px; cursor:pointer" class="text-primary">
                            <a>
                                {{ $f->judul }}
                            </a>
                        </td>
                        <td style=" padding-bottom:8px; cursor:pointer; width:20%">
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

    <div class="card">
        <div class="card-header">
            <h3 class="text-primary">
               Checklist Laporan
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
                                        <th width=1%>No.</th>
                                        <th width=20%>Nama User</th>
                                        <th width=50%>Projek Name</th>
                                        <th width=30%>Status</th>
                                        <th></th>
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
                                            @if ($f->bulanan_status==0)
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @endif                                           
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
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=1%>No.</th>
                                        <th width=20%>Nama User</th>
                                        <th width=50%>Projek Name</th>
                                        <th width=30%>Status</th>
                                        <th></th>
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
                                            @if ($f->triwulan_status==0)
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @endif 
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
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=1%>No.</th>
                                        <th width=20%>Nama User</th>
                                        <th width=50%>Projek Name</th>
                                        <th width=30%>Status</th>
                                        <th></th>
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
                                            @if ($f->tengahtahun_status==0)
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @endif 
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
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=1%>No.</th>
                                        <th width=20%>Nama User</th>
                                        <th width=50%>Projek Name</th>
                                        <th width=30%>Status</th>
                                        <th></th>
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
                                            @if ($f->akhirtahun_status==0)
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @endif 
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
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=1%>No.</th>
                                        <th width=20%>Nama User</th>
                                        <th width=50%>Projek Name</th>
                                        <th width=30%>Status</th>
                                        <th></th>
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
                                            @if ($f->destudi_status==0)
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @endif 
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
                            <table class="table" id="table">
                                <thead>
                                    <tr>
                                        <th width=1%>No.</th>
                                        <th width=20%>Nama User</th>
                                        <th width=50%>Projek Name</th>
                                        <th width=30%>Status</th>
                                        <th></th>
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
                                            @if ($f->renaksi_status==0)
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @else
                                            <td>
                                                <div>
                                                    <a style="font-weight: 1000;"><i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </td>
                                            @endif 
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
    // $('#templateTable').DataTable();

    //dynamic modal
    jQuery(document).ready(function() {
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