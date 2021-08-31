@extends('admin/main')

@section('title', 'Profil')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Profil User</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-map"></i></li>
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
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="card ">
              {{-- <div class="card-avatar">
                <a href="javascript:;">
                  <img class="img" src="../assets/img/faces/marc.jpg" />
                </a>
              </div> --}}
              <div class="card-body">
                <h6 class="card-category text-gray card-profile">Detail Kamu</h6>
                <h4 class="card-title card-profile">{{ $data->name }}</h4>
                <p class="card-description">
                  <span>Nama : </span><strong>{{ $data->name }}</strong>
                </p>
                <p class="card-description">
                  <span>Email : </span><strong>{{ $data->email }}</strong>
                </p>
                <p class="card-description">
                  <span>Jabatan : </span><strong>{{ $data->jabatan }}</strong>
                </p>
                <p class="card-description">
                  <span>Jenis Kelamin : </span><strong>{{ $data->gender }}</strong>
                </p>
                <p class="card-description">
                  <span>Tempat Lahir : </span><strong>{{ $data->tempat_lahir }}</strong>
                </p>
                <p class="card-description">
                  <span>Tanggal Lahir : </span><strong>{{ $data->tanggal_lahir }}</strong>
                </p>
                <p class="card-description">
                  <span>Alamat : </span><strong>{{ $data->alamat }}</strong>
                </p>
                <p class="card-description">
                  <span>No. HP : </span><strong>{{ $data->no_hp }}</strong>
                </p>
              </div>
          </div>
        </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Profile</h4>
            <p class="card-category">Complete your profile</p>
          </div>
          <div class="card-body">
            <form role="form" method="post" action="{{ url('profile/' . $data->id) }}" enctype="multipart/form-data">
              @csrf
              {{ method_field('PUT') }}
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Nama</label>
                    <input type="text" name="name" class="form-control"  required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email</label>
                    <input type="text" name="email" class="form-control"  required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control"  required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating" for="gender">Jenis Kelamin</label>
                    <br />
                    <input type="radio" name="gender" > Male
                    <input type="radio" name="gender" > Female
                </div>
              </div>
              <div class="row">
                <div class="col-md-5">
                  <div class="form-group">
                    <label class="bmd-label-floating">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tempat_lahir" required>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="form-group">
                    <label class="bmd-label-floating" >Tanggal Lahir</label>
                    
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="form-group">
                    
                    <input type="date" class="form-control" name="tanggal_lahir"required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Alamat</label>
                    <input type="text" class="form-control" name="alamat" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">No. HP</label>
                    <input type="text" class="form-control" name="no_hp" required>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
              <div class="clearfix"></div>
            </form>
          </div>
          <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-key"></i> Ubah Password?</a>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Ini adalah Bagian Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Ubah Password</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Ini adalah Bagian Body Modal -->

            <form action="{{ url('profile/' . $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="card-body">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach 
  
                        <div class="form-group row">
                            <label for="password" >Current Password</label>
  
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password" required>
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" >New Password</label>
  
                            <div class="col-md-12">
                                <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password" required>
                            </div>
                        </div>
  
                        <div class="form-group row">
                            <label for="password" >New Confirm Password</label>
    
                            <div class="col-md-12">
                                <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password" required>
                            </div>
                        </div>
                </div>
                </div>
                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update Password</button>
                </div>
            </form>


        </div>
    </div>
</div>
</div>

{{-- <script>
    $('#reportTable').DataTable();
</script> --}}
@endsection