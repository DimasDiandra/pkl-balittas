<link href="{{ asset('/css/sb-admin-2.css') }}" rel="stylesheet">
<script src="{{ asset('/js/app.js') }}">
</script>

<!DOCTYPE html>
<html>

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
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- Sidebar  -->
                    <nav id="sidebar">
                        <div class="sidebar-header">
                            <a class="navbar-brand" style="font-weight: 600; font-size: 25px;" href="{{ url('/') }}">
                                BALITTAS
                            </a>
                        </div>

                        <ul class="list-unstyled components">
                            <p>{{ __('Halo,') }} {{ Auth::user()->name }}</p>
                            <li>
                                <a href="/home">Home</a>
                            </li>
                            <li class="active">
                                <a href="/upload">Perencanaan</a>
                            </li>
                            <li>
                                <a href="/report">Report</a>
                            </li>
                        </ul>

                        <ul class="list-unstyled CTAs">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();" class="btn-danger">
                                    {{ __('Logout') }}</a>
                            </li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </nav>
                    <!-- end of sidebar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">Perencanaan</h1>

                        <div class="row" style="padding-bottom: 16px;">
                            <!-- Card Laporan-->

                            <div class="col-lg-3">

                                <div class="card shadow" style="height: 100%;">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Laporan</h6>
                                    </div>
                                    <div class="card-body">
                                        <p>nama user upload 1
                                        </p>
                                    </div>

                                </div>

                            </div>
                            <!-- End Of Card Laporan -->

                            <!-- Card Upload-->
                            <div class="col-lg-6">

                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Kelengkapan Document</h6>
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

                                            <div class="form-group">
                                                <b>File Matriks</b><br />
                                                <input type="file" name="matriks">
                                            </div>

                                            <div class="form-group">
                                                <b>File RAB</b><br />
                                                <input type="file" name="rab">
                                            </div>

                                            <div class="form-group">
                                                <b>File KAK</b><br />
                                                <input type="file" name="kak">
                                            </div>

                                            <div class="form-group">
                                                <b>File Proposal</b><br />
                                                <input type="file" name="proposal">
                                            </div>

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
                            <div class="col-lg-3 ">
                                <div class="card shadow mb-4" style="height: 100%;">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Ajukan Revisi</h6>
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
                                        <h6 class="m-0 font-weight-bold text-primary">History Perencanaan</h6>
                                    </div>
                                    <div class="card-body evaluasi">
                                        <table class="table table-responsive table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Matriks</th>
                                                    <th width="1%">RAB</th>
                                                    <th width="1%">KAK</th>
                                                    <th width="1%">Proposal</th>
                                                    <th width="1%">Analisis Resiko</th>
                                                    {{-- <th width="1%">OPSI</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($gambar as $g)
                                                <tr>
                                                    <td>{{ $g->matriks }}</td>
                                                    <td>{{ $g->rab }}</td>
                                                    <td>{{ $g->kak }}</td>
                                                    <td>{{ $g->proposal }}</td>
                                                    <td>{{ $g->analisis }}</td>
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
                </div>
            </div>
        </div>

    </body>

</html>