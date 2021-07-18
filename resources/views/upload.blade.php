@extends('main')

@section('title', 'Perencanaan')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perencanaan</h1>

    <div class="row" style="padding-bottom: 16px;">
        <!-- Card Laporan-->

        <div class="column w-30 p-r-16">

            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Laporan</h6>
                </div>
                <div class="card-body">
                    <p>nama user upload 1
                    </p>
                </div>

            </div>

        </div>
        <!-- End Of Card Laporan -->

        <!-- Card Upload-->
        <div class="column w-50 p-r-16">

            <div class="card shadow h-100">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Kelengkapan Document</h6>
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br />
                        @endforeach
                    </div>
                    @endif

                    <form action="/upload/proses" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <!-- <input type="hidden" name="matriks" value="NULL"> -->
                        <div class="form-group">
                            <b>File Matriks</b><br />
                            <input type="file" name="matriks">
                        </div>
                        <!-- <input type="hidden" name="rab" value="NULL"> -->
                        <div class="form-group">
                            <b>File RAB</b><br />
                            <input type="file" name="rab">
                        </div>
                        <!-- <input type="hidden" name="kak" value="NULL"> -->
                        <div class="form-group">
                            <b>File KAK</b><br />
                            <input type="file" name="kak">
                        </div>
                        <!-- <input type="hidden" name="proposal" value="NULL"> -->
                        <div class="form-group">
                            <b>File Proposal</b><br />
                            <input type="file" name="proposal">
                        </div>
                        <!-- <input type="hidden" name="analisis" value="NULL"> -->
                        <div class="form-group">
                            <b>File Analisis Resiko</b><br />
                            <input type="file" name="analisis">
                        </div>

                        <input type="submit" value="Upload" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>

        <!-- Card Revisi-->
        <div class="column w-20">
            <div class="card shadow mb-4 h-100">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Ajukan Revisi</h6>
                </div>
                <div class="card-body">
                    <a href="/revisi" class="btn btn-primary">Ajukan Revisi</a>
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <!-- Card History-->
        <div class="column" style="width: 100%;">

            <div class="card shadow history-perencanaan">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">History Perencanaan</h6>
                </div>
                <div class="card-body evaluasi">
                    <table class="table table-responsive table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="1%">User</th>
                                <th width="1%">Matriks</th>
                                <th width="1%">RAB</th>
                                <th width="1%">KAK</th>
                                <th width="1%">Proposal</th>
                                <th width="1%">Analisis Resiko</th>
                                <th width="1%">Tanggal Upload</th>
                                {{-- <th width="1%">OPSI</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gambar as $g)
                            <tr>
                                <td>{{ $g->user }}</td>
                                <td>{{ $g->matriks }}</td>
                                <td>{{ $g->rab }}</td>
                                <td>{{ $g->kak }}</td>
                                <td>{{ $g->proposal }}</td>
                                <td>{{ $g->analisis }}</td>
                                <td>{{ $g->created_at }}</td>
                                {{-- <td><a class="btn btn-danger"
                                            href="/upload/hapus/{{ $g->id }}">HAPUS</a></td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection