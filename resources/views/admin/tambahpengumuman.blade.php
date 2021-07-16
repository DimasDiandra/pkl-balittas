@extends('admin/main')

@section('title', 'Pengumuman')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pengumuman</h1>
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

    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Tambah Pengumuman</strong>
                </div>
                <div class="pull-right">
                    <!-- Button trigger modal -->
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus">Tambah</i></a>
                </div> 
            </div>
            
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="table-datatables">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="30%">Judul</th>
                            <th width="30%">Pengumuman</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($userdata as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td class="text-center"><a href="" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a></td>
                        </tr>
        
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Ini adalah Bagian Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Ini adalah Bagian Body Modal -->
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                          <label for="judulpengumuman" class="form-label">Judul Pengumuman</label>
                          <input type="text" class="form-control" id="judulpengumuman" placeholder="Isikan Judul Pengumuman Disini">
                        </div>
                        <div class="mb-3">
                          <label for="isipengumuman" class="form-label">Isi Pengumuman</label>
                          <input type="text" class="form-control" id="isipengumuman" placeholder="Isikan Judul Pengumuman Disini">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

