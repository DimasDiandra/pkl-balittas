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
<div class="row">
    <div class="col">
        <div class="card card-stats">
            <a href="/admin/user">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons fa fa-user"></i>
                    </div>
                    <h6 class="card-category">Data User</h6>
                    <h3 class="card-title">{{$user->count()}}
                        <small>User</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <a> Lihat dan Edit data user</a>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-stats">
            <a href="/admin/projek">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons fa fa-puzzle-piece"></i>
                    </div>
                    <h6 class="card-category">Data Projek</h6>
                    <h3 class="card-title">{{$projek->count()}}
                        <small>Projek</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <a> Lihat dan Edit data projek</a>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-stats">
            <a href="/admin/pengumuman">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons fa fa-bullhorn"></i>
                    </div>
                    <h6 class="card-category">Data Pengumuman</h6>
                    <h3 class="card-title">{{$pengumuman->count()}}
                        <small>Pengumuman</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <a> Lihat dan Edit data pengumuman</a>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card card-stats h-75">
            <a href="/admin/perencanaan">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons fa fa-map"></i>
                    </div>
                    <h6 class="card-category">Data Perencanaan</h6>
                    <h3 class="card-title">{{$projek->count()}}
                        <small>Projek</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <a> Lihat dan Edit data perencanaan</a>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-stats h-75">
            <a href="/admin/evaluasi">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons fa fa-flag"></i>
                    </div>
                    <h6 class="card-category">Data Monev</h6>
                    <h3 class="card-title">{{$projek->count()}}
                        <small>Projek</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <a> Lihat dan Edit data Monev</a>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-stats h-75">
            <a href="/admin/template">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons fa fa-file"></i>
                    </div>
                    <h6 class="card-category">Data Template</h6>
                    <h3 class="card-title">{{$file->count()}}
                        <small>Template</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <a> Lihat dan Edit data template</a>
                </div>
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card card-stats h-75">
            <a href="/admin/revisi">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons fa fa-repeat"></i>
                    </div>
                    <h6 class="card-category">Data Revisi Anggaran</h6>
                    <h3 class="card-title">{{$projek->count()}}
                        <small>Projek</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <a> Lihat dan Edit data Revisi Anggaran</a>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <!-- progress -->
        <div class="card shadow overflow-auto" style="height: 60vh;">
            <div class=" card-header py-3">
                <h6 class="m-0 text-primary">Progres</h6>
            </div>
            <div class="card-body">
                @foreach($projek as $projek)
                <div style="padding-bottom: 16px;">
                    <h6 style="font-weight: 600;">{{$projek->name}}</h6>
                    <h7>{{
                            $users = trim(
                            $user->where('id',$projek->user_id)->pluck('name'),
                            '[""]')
                        }}</h7>
                    <div class="progress" style="height:8px">
                        <div class="progress-bar" role="progressbar" style="width: {{$projek->all_status}}%"></div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
</div>

@endsection