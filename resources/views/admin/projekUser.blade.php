@extends('admin/main')

@section('title', 'Data Projek')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>User Balittas</h1>
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
<div class="content mt-3">
    @if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span>
            {{session('success')}}
    </div>
    @endif
    <div class="box-body">

        <div class="card">
            <div class="card-header">
                <h3 class="m-0  text-primary">Projek</h3>
            </div>
            <div class="card-body table-responsive table-wrapper-scroll-y scrollbar">
                <table class="table table-borderless" id="table-datatables">
                    <thead>
                        <tr>
                            <th hidden>id</th>
                            <th width="1%">No.</th>
                            <th width="30%">Projek</th>
                            <th width="20%">User</th>
                            <th width="20%">Tenggat Projek</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projekdata as $data)
                        <tr>
                            <td hidden="true">{{ $data->id }}</td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{
                                $user = trim(
                                $userdata->where('id',$data->user_id)->pluck('name'),
                                '[""]'); }}</td>
                            <td>
                                {{date('F, Y', strtotime($data->periode_projek)) }}
                            </td>
                            <td>
                                <a href="{{ url('admin/projek/' .$data->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit" style="color: white;"><i class="menu-icon fa fa-pencil"></i> Edit</a>
                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus" data-id="{{$data->id}}"><i class="fa fa-trash-o"></i> Hapus </a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-success" data-toggle="modal" data-target="#buatProjekModal"><i class="fa fa-plus"></i> Buat Projek</button>
            </div>
        </div>
    </div>

    <!-- Modal Buat -->
    <div id="buatProjekModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Ini adalah Bagian Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Ini adalah Bagian Body Modal -->
                <div class="modal-body">
                    <form method="POST" action="projek/buat">
                        @csrf

                        <div class=" row">

                            <div class="col">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Nama Projek</label>
                                        <input type="text" name="projek_name" class="form-control" id="exampleInputPassword1" placeholder="Name" value="" required oninvalid="this.setCustomValidity('Masukkan Nama Projek Terlebih Dahulu')" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Periode Projek</label>
                                        <input type="date" name="projek_date" class="form-control"  placeholder="Name" value="" required oninvalid="this.setCustomValidity('Masukkan Periode Projek Terlebih Dahulu')" oninput="setCustomValidity('')">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Assign User</label>
                                        <select class="custom-select" name="user_id">
                                            <option selected value="Kosong" disabled selected hidden> Assign User
                                            </option>
                                            @foreach($userdata as $user)
                                            <option value="{{$user->id}}">{{$user->id}} - {{$user->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        Buat Projek
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Confirm Delete -->
    <div class="modal fade" id="deletemodal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Pengumuman</h5>
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
    <!-- End Modal Delete Pengumuman -->
</div>
<script>
    $(document).ready(function() {
        $('#table-datatables').on('click', '.btn-hapus', function() {
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
            $('#deletemodalform').attr('action', 'admin/projek/' + dataid[0]);
            $('#deletemodal').modal('show');
        });
    });
</script>
@endsection