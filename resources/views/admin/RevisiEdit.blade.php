@extends('admin/main')

@section('title', 'Edit Revisi Anggaran')


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
        <a href="{{ URL::previous()}}" style="font-weight: 500;"><i class="fa fa-arrow-left"></i> Back
        </a>
    </div>
    <div class="card">
        <div class="card-header">
            <h3 class="text-primary">
                Edit Status Revisi Anggaran
            </h3>
        </div>
        <div class="card-body">
            <form role="form" method="post" action="{{ url('admin/revisi/'. $jenis. '/' . $data->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">

                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <span id='tujuan'></span>
                                <label for="exampleInputEmail1">Status</label>
                                <select class="custom-select" name="status">
                                    <option value="1">Menunggu Review</option>
                                    <option value="2">Revisi</option>
                                    <option value="3">Diterima</option>
                                </select>
                            </div>
                        </div>
                        @if($data->status==3)
                        <div class="alert alert-warning">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class="material-icons">close</i>
                            </button>
                            <span>
                                Status File saat ini sudah <b> Diterima </b></span>
                        </div>
                        @endif
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for=>Nama File</label>
                            <br>
                            <input type="text" name="projek_id" class="form-control" id="exampleInputPassword1" placeholder="Name" value=" {{ $data->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for=>Projek</label>
                            <br>
                            <input type="text" name="projek_id" class="form-control" id="exampleInputPassword1" placeholder="Name" value=" {{ $projek->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for=>User</label>
                            <br>
                            <input type="text" name="projek_id" class="form-control" id="exampleInputPassword1" placeholder="Name" value=" {{ $user->name}}" readonly>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Assign</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection