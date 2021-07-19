@extends('admin/main')

@section('title', 'Edit Perencanaan')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Detail Perencanaan</h1>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

         

            <!-- Ini adalah Bagian Body Modal -->
            <div class="modal-body">
                <table class="table" id="table">
                    <thead>
                        <tr>
                            <th width=10%>No.</th>
                            <th width=20%>User</th>
                            <th width=20%>Matriks</th>
                            <th width=20%>RAB</th>
                            <th width=20%>KAK</th>
                            <th width=20%>Proposal</th>
                            <th width=20%>Analisis</th>
                            <th width=20%>Date Upload</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi dari keluaran data -->
                        @foreach ($matriks as $f)
                            <tr>
                                <form action="/perencanaan/download" method="GET">
                                    <td>{{ $loop->iteration }}</td>
                                    <input type="hidden" name="path" value=" {{ $f->path }}">
                                    <td>{{ $f->name }}</td>
                                    <td>{{ $f->file }}</td>
                                    <td>{{ $f->rab->file }}</td>
                                    <td>{{ $f->kak->file }}</td>
                                    <td>{{ $f->proposal->file }}</td>
                                    <td>{{ $f->analisis->file }}</td>
                                    <td>{{ $f->created_at }}</td>                                    
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- <!-- Ini adalah Bagian Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div> --}}

        </div>
    </div>
    {{-- <div class="content mt-3">
        <div class="box-body">
            <form role="form" method="post" action="{{ url('admin/perencanaan/' . $data->id) }}" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row">

                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleInputPassword1"
                                    placeholder="Name" value="{{ $data->name }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email" value="{{ $data->email }}">
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
    </div> --}}

@endsection
