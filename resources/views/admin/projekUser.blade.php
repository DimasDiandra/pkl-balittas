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
    <div class="box-body">

        <div class="card">
            <div class="card-header">
                <div class="pull-left">
                    <strong>Data Projek</strong>
                </div>
            </div>
            <div class="card-body table-responsive table-wrapper-scroll-y scrollbar">
                <table class="table table-borderless" id="table-datatables">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="30%">Name</th>
                            <th width="40%">Projek</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userdata as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{
                            $projek = trim(
                            $projekdata->where('user_id',$data->id)->pluck('name'),
                            '[""]') }}</td>
                            <td>
                                {{-- <div style="width:60px"> --}}
                                <a href="{{ url('admin/user/' .$data->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="menu-icon fa fa-pencil-square-o"></i></a>

                                <form action="{{ url('admin/user/' .$data->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                                    @method('delete')
                                    @csrf
                                    <button href="{{ url('user/'.$data->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></button>
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
@endsection