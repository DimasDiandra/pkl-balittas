<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="{{asset('/css/sb-admin-2-min.css')}}" rel="stylesheet">
    <link href="{{asset('/css/dragndrop.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style/assets/css/font-awesome.min.css') }}">

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
                        <a href="/admin">
                            <p>{{ __('Halo,') }} {{ Auth::user()->name }}</p>
                        </a>
                        <li class="{{ Request::is('home') ? 'active' : '' }}">
                            <a href="/home"> <i class="menu-icon fa fa-home"></i> Home</a>
                        </li>
                        <li class="{{ Request::is('upload') ? 'active' : '' }}">
                            <a href="/upload"> <i class="menu-icon fa fa-map"></i> Perencanaan</a>
                        </li>
                        <li class="{{ Request::is('report') ? 'active' : '' }}">
                            <a href="/report"> <i class="menu-icon fa fa-flag"></i> Report</a>
                        </li>
                        <li class="{{ Request::is('revisi') ? 'active' : '' }}">
                            <a href="/revisi"> <i class="menu-icon fa fa-repeat"></i> Revisi</a>
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
                @yield('content')


            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->


</body>


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