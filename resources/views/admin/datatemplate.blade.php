@extends('admin/main')

@section('title', 'Data Template')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Template</h1>
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
            {{ session('success') }}
        </div>
    @endif
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Template</strong>
                </div>
                <div class="pull-right">
                    <!-- Button trigger modal -->
                    <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" ><i class="fa fa-plus">Tambah</i></a>
                </div> 
            </div>
            
            <div class="card-body table-responsive">
                <table class="table table-bordered" id="table-datatables">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="30%">Nama File</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($file as $f)
						<tr>
							<td>{{ $loop->iteration }}</td>
							<td>{{ $f->nama_file }}</td>
                            <td class="text-center">
                                <form action="{{ url('admin/template/' .$f->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus template?')">
                                    @method('delete')
                                    @csrf
                                    <button href="{{ url('template/'.$f->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
                                </form>
                            </td>
                            
							
						</tr>
						@endforeach
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
                    <h4 class="modal-title">Tambah Template</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Ini adalah Bagian Body Modal -->
                
                <form action="{{ url('admin/template') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama_file" class="col-md-4 col-form-label text-md-right">{{ __('Pilih File') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="nama_file" id="nama_file" required>
                            </div>
                        </div>
                    </div>
                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
</div>
@endsection

