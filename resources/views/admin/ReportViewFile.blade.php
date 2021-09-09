@extends('admin/main')

@section('title', 'Edit report')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail report</h1>
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
        <a href="/admin/report" style="font-weight: 500; cursor:pointer;" class="text-primary"><i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="text-primary">
                Data File {{$user->name}}
            </h3>
        </div>
        <div class="row  card-body">
            <div class="col">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" href="#bulanan" role="tab" data-toggle="tab">Bulanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#triwulan" role="tab" data-toggle="tab">Triwulan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#tengahTahun" role="tab" data-toggle="tab">Tengah Tahun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#akhirTahun" role="tab" data-toggle="tab">Akhir Tahun</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#renaksi" role="tab" data-toggle="tab">Renaksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="#destudi" role="tab" data-toggle="tab">Deskstudi</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="tab-content" id="nav-tabContent">
                    <!-- bulanan -->
                    <div class="tab-pane fade show active" id="bulanan" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table_bulanan">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
                                        <th width=5%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($bulanan as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $f->name }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}</td>
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
                                            <div style="float: left;">
                                                <form action="bulanan/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="bulanan" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusbulanan" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/report/download" method="GET">
                                                    <input type="hidden" name="path" value=" {{$f->path}}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- triwulan -->
                    <div class="tab-pane fade" id="triwulan" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="modal-body">
                            <table class="table" id="table_triwulan">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
                                        <th width=5%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($triwulan as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <input type="hidden" name="path" value=" {{$f->path}}">
                                        <td>{{ $f->name }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}</td>
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
                                            <div style="float: left;">
                                                <form action="triwulan/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="triwulan" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusbulanan" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/report/download" method="GET">
                                                    <input type="hidden" name="path" value=" {{$f->path}}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- tengahTahun -->
                    <div class="tab-pane fade" id="tengahTahun" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="modal-body">
                            <table class="table" id="table_tengahTahun">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
                                        <th width=5%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($tengahTahun as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <input type="hidden" name="path" value=" {{$f->path}}">
                                        <td>{{ $f->name }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}</td>
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
                                            <div style="float: left;">
                                                <form action="tengah/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="tengah" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusbulanan" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/report/download" method="GET">
                                                    <input type="hidden" name="path" value=" {{$f->path}}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- akhirTahun -->
                    <div class="tab-pane fade" id="akhirTahun" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="modal-body">
                            <table class="table" id="table_akhirTahun">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
                                        <th width=5%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($akhirTahun as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $f->name }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}</td>
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
                                            <div style="float: left;">
                                                <form action="akhir/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="akhir" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusbulanan" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/report/download" method="GET">
                                                    <input type="hidden" name="path" value=" {{$f->path}}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        </form>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- renaksi -->
                    <div class="tab-pane fade" id="renaksi" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="modal-body">
                            <table class="table" id="table_renaksi">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
                                        <th width=5%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($renaksi as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <input type="hidden" name="path" value=" {{$f->path}}">
                                        <td>{{ $f->name }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}</td>
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
                                            <div style="float: left;">
                                                <form action="renaksi/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="renaksi" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusbulanan" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/report/download" method="GET">
                                                    <input type="hidden" name="path" value=" {{$f->path}}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- deskstudi -->
                    <div class="tab-pane fade" id="destudi" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="modal-body">
                            <table class="table" id="table_destudigit">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
                                        <th width=5%>No.</th>
                                        <th width=30%>File Name</th>
                                        <th>Date Upload</th>
                                        <th width=20%>Status</th>
                                        <th width=30% colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Isi dari keluaran data -->
                                    @foreach($destudi as $f)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $f->name }}</td>
                                        <td>{{ $date = substr($f->created_at, 2, 8) }}</td>
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
                                            <div style="float: left;">
                                                <form action="destudi/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="destudi" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusbulanan" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/report/download" method="GET">
                                                    <input type="hidden" name="path" value="{{$f->path}}">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i>
                                                    </button>
                                                </form>
                                            </div>
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
    <!-- Modal Confirm Delete -->
    <div class="modal fade" id="deletemodal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus File</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form id="deletemodalform" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <div class="modal-body">
                        <input type="text" hidden id="inputjudul">
                        <input type="text" hidden id="inputid">
                        <h5><strong>Yakin ingin hapus data ini?</strong></h5>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-danger btn-xs hapus-btn">Hapus Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- End Modal Delete  -->
</div>
<!-- script -->
<script>
    $(document).ready(function() {
        // DataTables

        $('#table_bulanan').DataTable({
            "autoWidth": false
        });
        $('#table_triwulan').DataTable({
            "autoWidth": false
        });
        $('#table_tengahTahun').DataTable({
            "autoWidth": false
        });
        $('#table_akhirTahun').DataTable({
            "autoWidth": false
        });
        $('#table_renaksi').DataTable({
            "autoWidth": false
        });
        $('#table_destudi').DataTable({
            "autoWidth": false
        });
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust().responsive.recalc();
    });
</script>

<!-- jquery bulanan -->
<script>
    $(document).ready(function() {
        $('#table_bulanan').on('click', '.hapusbulanan', function() {
            const id = $(this).attr('data-id');
            console.log(id);
            // var col2=currentRow.find("td:eq(1)").text();
            // var datajudul=col2;

            $tr = $(this).closest("tr");
            var dataid = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // $('#inputjudul').val(datajudul);
            $('#inputid').val(dataid[0]);
            $('#deletemodalform').attr('action', 'bulanan/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery triwulan -->
<script>
    $(document).ready(function() {
        $('#table_triwulan').on('click', '.hapustriwulan', function() {
            const id = $(this).attr('data-id');
            console.log(id);
            // var col2=currentRow.find("td:eq(1)").text();
            // var datajudul=col2;

            $tr = $(this).closest("tr");
            var dataid = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // $('#inputjudul').val(datajudul);
            $('#inputid').val(dataid[0]);
            $('#deletemodalform').attr('action', 'triwulan/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery tengahTahun -->
<script>
    $(document).ready(function() {
        $('#table_tengahTahun').on('click', '.hapustengahTahun', function() {
            const id = $(this).attr('data-id');
            console.log(id);
            // var col2=currentRow.find("td:eq(1)").text();
            // var datajudul=col2;

            $tr = $(this).closest("tr");
            var dataid = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // $('#inputjudul').val(datajudul);
            $('#inputid').val(dataid[0]);
            $('#deletemodalform').attr('action', 'tengahTahun/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery akhirTahun -->
<script>
    $(document).ready(function() {
        $('#table_akhirTahun').on('click', '.hapusakhirTahun', function() {
            const id = $(this).attr('data-id');
            console.log(id);
            // var col2=currentRow.find("td:eq(1)").text();
            // var datajudul=col2;

            $tr = $(this).closest("tr");
            var dataid = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // $('#inputjudul').val(datajudul);
            $('#inputid').val(dataid[0]);
            $('#deletemodalform').attr('action', 'akhirTahun/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery renaksi -->
<script>
    $(document).ready(function() {
        $('#table_renaksi').on('click', '.hapusrenaksi', function() {
            const id = $(this).attr('data-id');
            console.log(id);
            // var col2=currentRow.find("td:eq(1)").text();
            // var datajudul=col2;

            $tr = $(this).closest("tr");
            var dataid = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            // $('#inputjudul').val(datajudul);
            $('#inputid').val(dataid[0]);
            $('#deletemodalform').attr('action', 'renaksi/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>

@endsection