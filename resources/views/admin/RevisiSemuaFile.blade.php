@extends('admin/main')

@section('title', 'Edit Revisi')


@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Detail Revisi Anggaran</h1>
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
        <a href="/admin/revisi" style="font-weight: 500; cursor:pointer;" class="text-primary"><i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="card">
        <div class="row card-body">
            <div class="col">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a class="nav-link active" href="#semula_menjadi" role="tab" data-toggle="tab">Semula Menjadi</a>
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
                            <table class="table" id="table-semula_menjadi">
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
                                    @foreach ($semula_menjadi as $f)
                                    <tr>
                                        <td hidden="true">{{ $f->id }}</td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $f->created_at }}
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
                                            <form action="semula_menjadi/{{$f->id}}" method="GET">
                                                <input type="hidden" value="semula_menjadi" name="jenis">
                                                <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapussemula_menjadi" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>

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

                    <!-- Revisi RAB -->
                    <div class="tab-pane fade show " id="revisi_rab" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="modal-body">
                            <table class="table" id="table-revisi_rab">
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
                                    @foreach ($revisi_rab as $f)
                                    <tr>
                                        <td hidden="true">{{ $f->id }}</td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $f->created_at }}
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
                                            <form action="revisi_rab/{{$f->id}}" method="GET">
                                                <input type="hidden" value="revisi_rab" name="jenis">
                                                <button class="btn btn-warning btn-xs btn-edit" type="submit">
                                                    <i class="menu-icon fa fa-pencil"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus hapusrevisi_rab" data-id="{{$f->id}}"><i class="fa fa-trash-o"></i></a>

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
<!-- jquery semula_menjadi -->
<script>
    $(document).ready(function() {
        $('#table-semula_menjadi').on('click', '.hapussemula_menjadi', function() {
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
            $('#deletemodalform').attr('action', 'semula_menjadi/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
<!-- jquery revisi_rab -->
<script>
    $(document).ready(function() {
        $('#table-revisi_rab').on('click', '.hapusrevisi_rab', function() {
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
            $('#deletemodalform').attr('action', 'revisi_rab/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>

@endsection