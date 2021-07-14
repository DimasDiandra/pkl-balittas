@extends('admin/main')

@section('title', 'Dashboard')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
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
        <div class="row  justify-content-center">
            <div class="col-lg-3">
                <div class="card shadow" style="height:20vh;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                    </div>
                    <div class="card-body perencanaan">
                        
                        <a href="/admin/user" class="btn btn-primary">Data User</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card shadow" style="height:20vh;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
                    </div>
                    <div class="card-body perencanaan">
                        
                        <a href="/admin/pengumuman" class="btn btn-primary">Pengumuman</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="card shadow" style="height:20vh;">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Perencanaan</h6>
                    </div>
                    <div class="card-body perencanaan">
                        
                        <a href="/admin/perencanaan" class="btn btn-primary">Perencanaan</a>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="content mt-3">
    <div class="row  justify-content-center">
        <div class="col-lg-3">
            <div class="card shadow" style="height:20vh;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Evaluasi</h6>
                </div>
                <div class="card-body perencanaan">
                    
                    <a href="/admin/evaluasi" class="btn btn-primary">Evaluasi</a>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card shadow" style="height:20vh;">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Data Template</h6>
                </div>
                <div class="card-body perencanaan">
                    
                    <a href="/admin/template" class="btn btn-primary">Data Template</a>
                </div>
            </div>
        </div>
    </div>
</div>   

@endsection

