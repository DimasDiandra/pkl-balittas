@extends('main')

@section('title', 'Report')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Report</h1>

    <div class="row" style="padding-bottom:16px">

        <!-- Card Upload-->
        <div class="column w-70 p-r-16">

            <div class="card shadow mb-4" style="height: 100%;">
                <div class="card-header py-3">
                    <h6 class="m-0 text-primary">Upload Report</h6>
                </div>
                <div class="card-body">
                    <form action="/report/upload" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <form action="/UploadReport/proses" method="POST" enctype="multipart/form-data">
                            <div class="drop-zone">
                                <span class="drop-zone__prompt"> Drop File Here or Click to Upload</span>
                                <input type="file" name="file" class="drop-zone__input">
                            </div>
                            <div style="margin-top: 10px">
                                <select class="custom-select" name="keterangan">
                                    <option selected>Jenis File</option>
                                    <option value="Laporan Bulanan">Laporan Bulanan</option>
                                    <option value="Laporan Triwulan">Laporan Triwulan</option>
                                    <option value="Laporan Tengah Tahun">Laporan Tengah Tahun</option>
                                    <option value="Laporan Akhir Tahun">Laporan Akhir Tahun</option>
                                    <option value="Foto">Foto</option>
                                </select>
                            </div>
                            <!-- <? //$name = "test" 
                                    ?>
                                        <input type="hidden" value="name"> -->
                            <div>
                                <input class="btn btn-primary" style="float:right; margin-top: 10px;" type="submit">
                            </div>
                        </form>
                </div>
            </div>

        </div>
        <!-- End Of Card Upload -->

        <!-- Card Download-->
        <div class="column w-30">

            <div class="card shadow mb-4" style="height: 100%;">
                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Report Template</h6>
                </div>
                <div class="card-body">
                    <p>Template disini
                    </p>
                </div>
            </div>

        </div>
        <!-- End Of Card Upload -->
    </div>

    <div class="row">
        <!-- Card History-->

        <div class="column w-100">

            <div class="card shadow">

                <div class="card-header py-3">
                    <h6 class="m-0  text-primary">Report History</h6>
                </div>

                <div class="card-body">
                    <!-- table -->
                    <table class="table table-sm table-hover">
                        <tbody>
                            @foreach($report as $r)
                            <tr>
                                <td>{{$r->created_at}}</td>
                                <td width=50% class=align-middle>{{$r->file}}</td>
                                <td width=30%>{{$r->keterangan}}</td>
                                <!-- <td><a class="btn btn-danger" href="/upload/hapus/{{ $r->id }}">HAPUS</a></td> -->
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <!-- End Of Card History -->
    </div>
</div>
@endsection