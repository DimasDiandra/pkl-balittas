<!-- <!DOCTYPE html>
<html>

<head>
    <title>Perencanaan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="row">
        <div class="container">

            <h2 class="text-center my-5">Upload Perencanaan</h2>

            <div class="col-lg-8 mx-auto my-5">

                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                    {{ $error }} <br />
                    @endforeach
                </div>
                @endif

                <form action="/upload/proses" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <b>File Gambar</b><br />
                        <input type="file" name="file">
                    </div>

                    <div class="form-group">
                        <b>Keterangan</b>
                        <textarea class="form-control" name="keterangan"></textarea>
                    </div>

                    <input type="submit" value="Upload" class="btn btn-primary">
                </form>

                <h4 class="my-5">Data</h4>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="1%">File</th>
                            <th>Keterangan</th>
                            <th width="1%">OPSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($gambar as $g)
                        <tr>
                            <td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
                            <td>{{$g->keterangan}}</td>
                            <td><a class="btn btn-danger" href="/upload/hapus/{{ $g->id }}">HAPUS</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html> -->
<link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
<script src="{{ asset('/js/app.js') }}">

</script>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Perencanaan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Perencanaan</h1>

                    <div class="row">
                        <!-- Card History-->

                        <div class="col-lg-3">

                            <div class="card shadow" style="height: 70vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                                </div>
                                <div class="card-body">
                                    <p>nama user upload 1
                                    </p>
                                </div>

                            </div>

                        </div>
                        <!-- End Of Card History -->

                        <!-- Card Upload-->
                        <div class="col-lg-6">

                            <div class="card shadow mb-4" style="height: 83vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Kelengkapan Document</h6>
                                </div>
                                <div class="card-body">
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Matriks</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">RAB</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">KAK</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" required>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Proposal</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </form>
                                    <form>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Analisis Resiko</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                        </div>
                                    </form>
                                    <a href="#" class="btn btn-primary">Submit</a>
                                </div>
                            </div>

                        </div>
                        <!-- End Of Card Upload -->

                        <!-- Card Download-->
                        <div class="col-lg-3">

                            <div class="card shadow mb-4" style="height: 70vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Download File</h6>
                                </div>
                                <div class="card-body">
                                    <p>Data File User yang Downloadable
                                    </p>
                                </div>
                            </div>

                        </div>
                        <!-- End Of Card Upload -->
                    </div>

                    <div class="row">
                        <!-- Card History-->
                        <div class="col-lg-3">

                            <div class="card shadow history-perencanaan" style="height:40vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">History Perencanaan</h6>
                                </div>
                                <div class="card-body evaluasi">
                                    <p>History perencanaan disini</p>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>