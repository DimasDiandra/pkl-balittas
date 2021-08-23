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
                            <th width="1%">No.</th>
                            <th width="40%">Projek</th>
                            <th width="30%">User</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projekdata as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{
                                $user = trim(
                                $userdata->where('id',$data->user_id)->pluck('name'),
                                '[""]') }}</td>
                            <td>
                                {{-- <div style="width:60px"> --}}
                                <a href="{{ url('admin/projek/' .$data->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit" style="color: white;"><i class="menu-icon fa fa-pencil"></i> Edit</a>
                                <form action="{{ url('admin/projek/' .$data->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                    @method('delete')
                                    @csrf
                                    <button href="{{ url('projek/'.$data->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i> Hapus </button>
                                </form>

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
                                        <label for="exampleInputEmail1"  >Assign User</label>
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
    <!-- End Modal Buat -->

    <!-- Modal Confirm Delete -->
    <div class="modal fade" id="deletemodal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Pengumuman</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            @foreach ($projekdata as $data)
            <form action="{{ url('admin/projek/' .$data->id) }}" id="deletemodalform" method="post" class="d-inline" >
                @method('delete')
                @csrf
                
            </form>
            
                <div class="modal-body">
                <h5><strong>Yaking ingin hapus data ini?</strong></h5>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button class="btn btn-danger btn-xs btn-hapus">Hapus </button>
                </div>
            </form>
            @endforeach
          </div>
        </div>
    </div>
      <!-- End Modal Delete Pengumuman -->
</div>
@endsection