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
        <a href="/admin/evaluasi" style="font-weight: 500; cursor:pointer;" class="text-primary"><i class="fa fa-arrow-left"></i> Back
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
                                        <th hidden>id</th>
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
                                        <td hidden="true">{{ $f->id }}</td>
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
                                            <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusbulanan" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>

                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i>
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
                            <table class="table" id="table-triwulan">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
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
                                        <td hidden="true">{{ $f->id }}</td>
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
                                                <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapustriwulan" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>

                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i>
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
                            <table class="table" id="table-tengah">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
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
                                        <td hidden="true">{{ $f->id }}</td>
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
                                                <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapustengah" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i>
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
                            <table class="table" id="table-akhir">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
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
                                        <td hidden="true">{{ $f->id }}</td>
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
                                                <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusakhir" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i>
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
                            <table class="table" id="table-destudi">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
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
                                        <td hidden="true">{{ $f->id }}</td>
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
                                                <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusdestudi" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i>
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
                            <table class="table" id="table-renaksi">
                                <thead>
                                    <tr>
                                        <th hidden>id</th>
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
                                        <td hidden="true">{{ $f->id }}</td>
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
                                                <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusrenaksi" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                        <td>
                                            <input type="hidden" name="path" value=" {{ $f->path }}">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i>
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

<!-- jquery bulanan -->
<script>
    $(document).ready(function() {
        $('#table').on('click', '.hapusbulanan', function() {
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
        $('#table-triwulan').on('click', '.hapustriwulan', function() {
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
<!-- jquery tengah tahun -->
<script>
    $(document).ready(function() {
        $('#table-tengah').on('click', '.hapustengah', function() {
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
            $('#deletemodalform').attr('action', 'tengah/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery akhir tahun -->
<script>
    $(document).ready(function() {
        $('#table-akhir').on('click', '.hapusakhir', function() {
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
            $('#deletemodalform').attr('action', 'akhir/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery destudi -->
<script>
    $(document).ready(function() {
        $('#table-destudi').on('click', '.hapusdestudi', function() {
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
            $('#deletemodalform').attr('action', 'destudi/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery renaksi -->
<script>
    $(document).ready(function() {
        $('#table-renaksi').on('click', '.hapusrenaksi', function() {
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