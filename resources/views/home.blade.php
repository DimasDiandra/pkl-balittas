@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Selamat Datang,') }} {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <div class="row">
                        <!-- Card History-->
                        
                        <div class="col-lg-3">

                            <div class="card shadow" style="height:30vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Perencanaan</h6>
                                </div>
                                <div class="card-body perencanaan">
                                    <p>Upload Data Perencanaan</p>
                                    <a href="/upload" class="btn btn-primary">Perencanaan</a>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-3">

                            <div class="card shadow" style="height: 40vh;">
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Pengumuman</h6>
                                </div>
                                <div class="card-body">
                                    <p>pengumuman 1</p>
                                    <p>pengumuman 2</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <!-- Card History-->
                        <div class="col-lg-3">

                            <div class="card shadow" style="height:30vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Evaluasi</h6>
                                </div>
                                <div class="card-body evaluasi">
                                    <p>Upload Data Evaluasi</p>
                                    <a href="/report" class="btn btn-primary">Evaluasi</a>
                                </div>

                            </div>

                        </div>
                        <div class="col-lg-3">

                            <div class="card shadow" style="height: 25vh;">
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Download Template</h6>
                                </div>
                                <div class="card-body">
                                    <p>document 1</p>
                                    <p>document 2</p>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection