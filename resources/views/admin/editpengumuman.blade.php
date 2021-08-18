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
        <div>
            <a href="./" style="font-weight: 500;"><i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
        <div class="card">
            <div class="card-header">
                <h6 class="text-primary">Edit Pengumuman</h6>
            </div>
            <div class="card-body">
                <form role="form" method="post" action="{{ url('admin/pengumuman/' . $data->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">

                        <div class="col-md-6">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="exampleInputPassword1"
                                        placeholder="Name" value="{{ $data->judul }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Isi Pengumuman</label>
                                    <input type="text" name="isi_pengumuman" class="form-control" id="exampleInputEmail1"
                                        placeholder="Enter email" value="{{ $data->isi_pengumuman }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
