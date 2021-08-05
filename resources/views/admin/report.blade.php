@extends('admin/main')

@section('title', 'Monev')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Monitoring dan Evaluasi</h1>
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
            <div class="card-body table-responsive">
                <table class="table table-borderless" id="table-datatables">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="30%">Name</th>
                            <th width="30%">Projek</th>
                            <th width="20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userdata as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->name }}</td>
                            @if(trim($projekdata
                            ->where('user_id',$data->id)->pluck('name'),
                            '[""]')
                            ==null)
                            <td>-</td>
                            @else
                            <td>{{$projek = trim(
                                $projekdata->where('user_id',$data->id)->pluck('name'),
                                '[""]')}}</td>
                            @endif
                            <td class="text-center">
                                <a href="{{ url('admin/evaluasi/' . $data->id) }}" class="btn btn-primary" id="edit"><i class="fa fa-eye"></i> Lihat Detail</a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

        @endsection