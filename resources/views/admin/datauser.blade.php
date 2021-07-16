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
                <strong>Data User</strong>
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
                        <th width="30%">Name</th>
                        <th width="30%">Email</th>
                        <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($userdata as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td class="text-center"><a href="" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a></td>
                    </tr>
    
                    @endforeach
    
                </tbody>
            </table>
        </div>
    </div>

    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Ini adalah Bagian Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Ini adalah Bagian Body Modal -->
                <div class="modal-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text"
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                    name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-12 col-form-label">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email"
                                    class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                class="col-md-12 col-form-label">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password"
                                    class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-12 col-form-label">{{ __('Confirm Password') }}</label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                        </div>
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

