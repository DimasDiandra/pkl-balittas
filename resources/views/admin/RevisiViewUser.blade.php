@extends('admin/main')

@section('title', 'Revisi Anggaran')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Revisi Anggaran</h1>
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
<div class="container-fluid">
    {{-- <div>
        <a href="{{ URL::previous()}}" style="font-weight: 500;"><i class="fa fa-arrow-left"></i> Back
    </a>
</div> --}}
<div class="card">
    <div class="card-header">
        <h3 class="m-0  text-primary">Revisi Anggaran</h3>
    </div>
    <div class="card-body table-responsive">
        <table class="table table-borderless" id="table-revisi">
            <thead>
                <tr>
                    <th width="1%">No.</th>
                    <th width="30%">Name</th>
                    <th width="30%">Projek</th>
                    <th width="20%">Action</th>
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
                    <td>
                        <a href="{{ url('admin/revisi/' . $data->id) }}" class="btn btn-primary" id="edit"><i class="fa fa-eye"></i> Lihat Detail</a>
                    </td>
                </tr>

                @endforeach

            </tbody>
        </table>
        <a href="{{ url('admin/revisi/file') }}" class="btn btn-primary"><i class="fa fa-file"></i> Lihat Semua File</a>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('#table-revisi').DataTable({
            "autoWidth": false
        });
        
    });
</script>

@endsection