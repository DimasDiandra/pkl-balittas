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
<div class="card card-body">
    <div class="row">
        <div class="col">
            <ul class="nav nav-pills nav-fill">
                <li class="nav-item">
                    <a class="nav-link active" href="#matriks" role="tab" data-toggle="tab">Matriks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#rab" role="tab" data-toggle="tab">RAB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#kak" role="tab" data-toggle="tab">KAK</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#proposal" role="tab" data-toggle="tab">Proposal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#analisis" role="tab" data-toggle="tab">Analisis Resiko</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="tab-content" id="nav-tabContent">
                <!-- Matriks -->
                <div class="tab-pane fade show active" id="matriks" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="modal-body">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th width=10%>No.</th>
                                    <th width=50%>File Name</th>
                                    <th width=20%>Date Upload</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Isi dari keluaran data -->
                                @foreach($matriks as $f)
                                {{-- @if($f->user_id==Auth::user()->id) --}}
                                <tr>
                                    <form action="/perencanaan/download" method="GET">
                                        <td>{{ $loop->iteration }}</td>
                                        <input type="hidden" name="path" value=" {{$f->path}}">
                                        <td>{{ $f->file }}</td>
                                        <td>{{ $f->created_at }}</td>
                                        <td class="float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- RAB -->
                <div class="tab-pane fade" id="rab" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="modal-body">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th width=10%>No.</th>
                                    <th width=50%>File Name</th>
                                    <th width=20%>Date Upload</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Isi dari keluaran data -->
                                @foreach($rab as $f)
                                {{-- @if($f->user_id==Auth::user()->id) --}}
                                <tr>
                                    <form action="/perencanaan/download" method="GET">
                                        <td>{{ $loop->iteration }}</td>
                                        <input type="hidden" name="path" value=" {{$f->path}}">
                                        <td>{{ $f->file }}</td>
                                        <td>{{ $f->created_at }}</td>
                                        <td class="float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                {{-- @endif --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- KAK -->
                <div class="tab-pane fade" id="kak" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="modal-body">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th width=10%>No.</th>
                                    <th width=50%>File Name</th>
                                    <th width=20%>Date Upload</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Isi dari keluaran data -->
                                @foreach($kak as $f)
                                @if($f->user_id==Auth::user()->id)
                                <tr>
                                    <form action="/perencanaan/download" method="GET">
                                        <td>{{ $loop->iteration}}</td>
                                        <input type="hidden" name="path" value=" {{$f->path}}">
                                        <td>{{ $f->file }}</td>
                                        <td>{{ $f->created_at }}</td>
                                        <td class="float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Proposal -->
                <div class="tab-pane fade" id="proposal" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="modal-body">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th width=10%>No.</th>
                                    <th width=50%>File Name</th>
                                    <th width=20%>Date Upload</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Isi dari keluaran data -->
                                @foreach($proposal as $f)
                                @if($f->user_id==Auth::user()->id)
                                <tr>
                                    <form action="/perencanaan/download" method="GET">
                                        <td>{{ $loop->iteration }}</td>
                                        <input type="hidden" name="path" value=" {{$f->path}}">
                                        <td>{{ $f->file }}</td>
                                        <td>{{ $f->created_at }}</td>
                                        <td class="float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Analisis -->
                <div class="tab-pane fade" id="analisis" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <div class="modal-body">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th width=10%>No.</th>
                                    <th width=50%>File Name</th>
                                    <th width=20%>Date Upload</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Isi dari keluaran data -->
                                @foreach($analisis as $f)
                                @if($f->user_id==Auth::user()->id)
                                <tr>
                                    <form action="/perencanaan/download" method="GET">
                                        <td>{{ $loop->iteration }}</td>
                                        <input type="hidden" name="path" value=" {{$f->path}}">
                                        <td>{{ $f->file }}</td>
                                        <td>{{ $f->created_at }}</td>
                                        <td class="float-right">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="menu-icon fa fa-download"></i> Download
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
