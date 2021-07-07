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
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <div id="app">
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                            <div class="container">
                                <a class="navbar-brand" style="font-weight: 600; font-size: 25px;" href="{{ url('/') }}">
                                    <!-- {{ config('app.name', 'Laravel') }} -->
                                    BALITTAS
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <!-- Left Side Of Navbar -->
                                    <ul class="navbar-nav mr-auto">
                
                                    </ul>
                
                                    <!-- Right Side Of Navbar -->
                                    <ul class="navbar-nav ml-auto">
                                        <!-- Authentication Links -->
                                        @guest
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                            <li class="nav-item">
                                                @if (Route::has('register'))
                                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                                @endif
                                            </li>
                                        @else
                                            <li class="nav-item dropdown">
                                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                    {{ Auth::user()->name }} <span class="caret"></span>
                                                </a>
                
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                            </li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </nav>
                
                        <main class="py-4">
                            @yield('content')
                        </main>
                    </div>
                    {{-- <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>


                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas McGee</span>
                                    <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
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

                    </nav> --}}
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-4 text-gray-800">Perencanaan</h1>

                        <div class="row">
                            <!-- Card History-->

                            <div class="col-lg-3">

                                <div class="card shadow" style="height: 60vh;">
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

                                <div class="card shadow mb-4" >
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
                           <!-- Card Download-->
                        <div class="col-lg-3">

                            <div class="card shadow mb-4" style="height: 60vh;">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Download File</h6>
                                </div>
                                <div class="card-body">
                                    <p>Data File User yang Downloadable
                                    </p>
                                </div>
                            </div>

                        </div>
                        </div>
                        <div class="row">
                            <!-- Card History-->
                            <div class="col-lg-11">

                                <div class="card shadow history-perencanaan">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">History Perencanaan</h6>
                                    </div>
                                    <div class="card-body evaluasi">
                                        <table class="table table-bordered table-striped">
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
