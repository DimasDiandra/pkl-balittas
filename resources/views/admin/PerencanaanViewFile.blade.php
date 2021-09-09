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
        <a href="/admin/perencanaan" style="font-weight: 500; cursor:pointer;" class="text-primary"><i class="fa fa-arrow-left"></i> Back
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
                                    @foreach($matriks as $f)
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
                                                <form action="matriks/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="matriks" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusmatriks" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/perencanaan/download" method="GET">
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
                    <!-- RAB -->
                    <div class="tab-pane fade" id="rab" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="modal-body">
                            <table class="table" id="table_rab">
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
                                    @foreach($rab as $f)
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
                                                <form action="rab/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="rab" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusmatriks" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/perencanaan/download" method="GET">
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
                    <!-- KAK -->
                    <div class="tab-pane fade" id="kak" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="modal-body">
                            <table class="table" id="table_kak">
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
                                    @foreach($kak as $f)
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
                                                <form action="kak/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="kak" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusmatriks" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/perencanaan/download" method="GET">
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
                    <!-- Proposal -->
                    <div class="tab-pane fade" id="proposal" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="modal-body">
                            <table class="table" id="table_proposal">
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
                                    @foreach($proposal as $f)
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
                                                <form action="proposal/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="proposal" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusmatriks" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/perencanaan/download" method="GET">
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
                    <!-- Analisis -->
                    <div class="tab-pane fade" id="analisis" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="modal-body">
                            <table class="table" id="table_analisis">
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
                                    @foreach($analisis as $f)
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
                                                <form action="analisis/{{$f->id}}" method="GET">
                                                    <input type="hidden" value="analisis" name="jenis">
                                                    <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                        <i class="menu-icon fa fa-pencil"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div style="float: left;">
                                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusmatriks" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                            <div style="float: left;">
                                                <form action="/perencanaan/download" method="GET">
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
    });
</script>

<!-- jquery matriks -->
<script>
    $(document).ready(function() {
        $('#table_matriks').on('click', '.hapusmatriks', function() {
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
            $('#deletemodalform').attr('action', 'matriks/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery rab -->
<script>
    $(document).ready(function() {
        $('#table_rab').on('click', '.hapusrab', function() {
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
            $('#deletemodalform').attr('action', 'rab/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery kak -->
<script>
    $(document).ready(function() {
        $('#table_kak').on('click', '.hapuskak', function() {
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
            $('#deletemodalform').attr('action', 'kak/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery proposal -->
<script>
    $(document).ready(function() {
        $('#table_proposal').on('click', '.hapusproposal', function() {
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
            $('#deletemodalform').attr('action', 'proposal/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery analisis -->
<script>
    $(document).ready(function() {
        $('#table_analisis').on('click', '.hapusanalisis', function() {
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
            $('#deletemodalform').attr('action', 'analisis/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>

@endsection