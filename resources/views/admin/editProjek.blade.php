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
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Edit Detail Projek</h6>
        </div>
        <div class="card-body">

            <form role="form" method="post" action="{{ url('admin/projek/' . $projekdata->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">

                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for=>Nama Projek</label>
                                <br>
                                <input type="text" name="projek_id" class="form-control" id="exampleInputPassword1" placeholder="Name" value="{{ $projekdata->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">User</label>
                                <select class="custom-select" name="user_id">
                                    <option selected value="Kosong">
                                        {{ $user = trim(
                                    $userdata->where('id',$projekdata->user_id)->pluck('id'),
                                    '[""]') }} - {{ $user = trim(
                                    $userdata->where('id',$projekdata->user_id)->pluck('name'),
                                    '[""]') }}
                                    </option>
                                    @foreach($userdata as $user)
                                    @if(trim(
                                    $userdata->where('id',$projekdata->user_id)->pluck('id'),
                                    '[""]') != $user->id)
                                    <option value="{{$user->id}}">{{$user->id}} - {{ $user->name }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
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