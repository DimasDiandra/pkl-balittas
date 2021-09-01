@extends('admin/main')

@section('title', 'Data User')

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
                <h3 class="m-0  text-primary">User</h3>

            </div>
            <div class="card-body table-responsive">
                <table class="table table-borderless" id="table-datatables">
                    <thead>
                        <tr>
                            <th hidden>id</th>
                            <th width="1%">No.</th>
                            <th width="40%">Name</th>
                            <th width="30%">Email</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userdata as $data)
                        <tr>
                            <td hidden="true">{{ $data->id }}</td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                {{-- <div style="width:60px"> --}}
                                <a href="{{ url('admin/user/' .$data->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit" style="color: white;"><i class="menu-icon fa fa-pencil"></i> Edit</a>
                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus" data-id="{{$data->id}}" ><i class="fa fa-trash-o"></i> Hapus </a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah User</button>
            </div>
        </div>

        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Ini adalah Bagian Header Modal -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah User</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Ini adalah Bagian Body Modal -->
                    <div class="modal-body">
                        <form action="{{ url('admin/user') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-12 col-form-label">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" autocomplete="off" required>

                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="off" required>
                                </div>
                            </div>

                            <div class="">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
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
        $(document).ready( function () {
            $('#table-datatables').on('click', '.btn-hapus', function(){
            const id = $(this).attr('data-id');
            console.log(id);
            // var col2=currentRow.find("td:eq(1)").text();
            // var datajudul=col2;
    
            $tr=$(this).closest("tr");
            var dataid = $tr.children("td").map(function(){
                return $(this).text();
            }).get();
    
            
            // $('#inputjudul').val(datajudul);
            $('#inputid').val(dataid[0]);
            $('#deletemodalform').attr('action','admin/user/'+dataid[0]);
            $('#deletemodal').modal('show');
            });
        });
        
    </script>
    
    @endsection