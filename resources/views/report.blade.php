<link href="{{asset('/css/sb-admin-2.css')}}" rel="stylesheet">
<link href="{{asset('/css/dragndrop.css')}}" rel="stylesheet">

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Report</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content" class="wrapper">
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
                        <li>
                            <a href="/upload">Perencanaan</a>
                        </li>
                        <li class="active">
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
                    <h1 class="h3 mb-4 text-gray-800">Report</h1>

                    <div class="row" style="padding-bottom:16px">

                        <!-- Card Upload-->
                        <div class="column w-70 p-r-16">

                            <div class="card shadow mb-4" style="height: 100%;">
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
                                    <h6 class="m-0 font-weight-bold text-primary">Report Template</h6>
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
                        <!-- End Of Card History -->
                    </div>


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- script -->
    <script src="{{ asset('/js/app.js') }}"></script>
    <script src="{{ asset('/js/dragndrop.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>

</body>

</html>