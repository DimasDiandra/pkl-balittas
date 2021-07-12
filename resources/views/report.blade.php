<!DOCTYPE html>
<html lang="en">

<head>
    <title>Report</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/report.css" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="css/sb-admin-2.css" rel="stylesheet">
    <link href="css/dragndrop.css" rel="stylesheet">

</head>

<body>
    <div class="row bg">
        <!-- sidebar -->
        <div class="column col-padding sidebar shadow">side bar</div>
        <!-- main content -->
        <div class="column">
            <!-- Card Upload-->
            <div class="row row-main">
                <div class="column col-padding" style="width: 900px;">

                    <div class="card shadow" style="height: 50vh;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Upload Report</h6>
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
                                    <div>
                                        <input class="btn btn-primary" style="float:right; margin-top: 10px;" type="submit">
                                    </div>
                                </form>
                        </div>
                    </div>

                </div>
                <!-- End Of Card Upload -->
                <!-- Card Download-->
                <div class="column col-padding" style="width:400px; padding-left:16px">
                    <div class="card shadow mb-4" style="height: 50vh;">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Report Template</h6>
                        </div>
                        <div class="card-body">
                            <p>Template disini
                            </p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Of Card Upload -->
            <!-- card history -->
            <div class="row row-main">
                <div class="column col-padding" style="width: 100%; padding-top:32px;">
                    <div class="card shadow" style="height: 100%;">

                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Report History</h6>
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
            </div>
            <!-- end of card history -->
        </div>
    </div>
</body>