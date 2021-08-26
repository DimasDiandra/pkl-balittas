<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}} ">
    <meta http-equiv=" X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        @yield('title') - Admin Balittas
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Drag n Drop -->
    <link rel="stylesheet" href="css/dragndrop.css">
    <!-- CSS Datatables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css">
    <!-- CSS Files -->
    <link href="/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />>



    <script>
        function jenis() {
            var jenis = document.getElementById("jenis").value;
            localStorage.setItem("jenis", jenis);
            return false;
        }
    </script>
</head>

<body class="">

    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('style/assets/js/plugins.js') }}"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap5.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/background.jpg">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="logo"><a href="/admin" class="simple-text logo-normal">
                    Balittas
                </a></div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{ Request::is('admin') ? 'active' : '' }}">
                        <a href="/admin" class="nav-link">
                            <i class="menu-icon fa fa-home"></i>
                            <p> Home</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/user') ? 'active' : '' }}">
                        <a href="/admin/user" class="nav-link">
                            <i class="menu-icon fa fa-user"></i>
                            <p> User</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/projek') ? 'active' : '' }} ">
                        <a href="/admin/projek" class="nav-link">
                            <i class="menu-icon fa fa-puzzle-piece"></i>
                            <p> Projek</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/pengumuman') ? 'active' : '' }}">
                        <a href="/admin/pengumuman" class="nav-link">
                            <i class="menu-icon fa fa-bullhorn"></i>
                            <p> Pengumuman</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/perencanaan') ? 'active' : '' }}">
                        <a href="/admin/perencanaan" class="nav-link">
                            <i class="menu-icon fa fa-map"></i>
                            <p> Perencanaan</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/evaluasi') ? 'active' : '' }}">
                        <a href="/admin/evaluasi" class="nav-link">
                            <i class="menu-icon fa fa-flag"></i>
                            <p> Monitoring dan Evaluasi</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/revisi') ? 'active' : '' }}">
                        <a href="/admin/revisi" class="nav-link">
                            <i class="menu-icon fa fa-flag"></i>
                            <p> Revisi Anggaran</p>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/template') ? 'active' : '' }}">
                        <a href="/admin/template" class="nav-link">
                            <i class="menu-icon fa fa-file"></i>
                            <p> Template </p>
                        </a>
                    </li>
                    <br>
                    <li>
                        <a class="nav-link signout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="menu-icon fa fa-sign-out"></i> <p> Logout </p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand"> Dashboard - {{Auth::user()->name}}</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">{{Auth::user()->unreadNotifications->count()}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    @forelse(Auth::user()->unreadNotifications as $notification)
                                    <a class="dropdown-item" href="#">
                                        {{$notification->data['name']}}
                                        {{$notification->data['status']}}
                                    </a>
                                    @endforeach
                                    @forelse(Auth::user()->readNotifications->take(10) as $notification)
                                    <a class="dropdown-item" href="#" style="color: gray">
                                        {{$notification->data['name']}}
                                        {{$notification->data['status']}}
                                    </a>
                                    @empty
                                    <p class="dropdown-item">Tidak ada Notifikasi</p>
                                    @endforelse
                                    <div class="dropdown-divider"></div>
                                    <a href=" {{ url('markRead') }}" class="dropdown-header">Tandai Sudah Dibaca</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <div class="dropdown-divider"></div>

                                    <a href="/home" class="dropdown-item"> Home Page</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->

            <div class="content">
                @yield('content')

            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="/home">
                                    Sispro Balittas
                                </a>
                            </li>
                            <li>
                                <a href="https://api.whatsapp.com/send?phone=6285933167404&text=Bagaimana%20cara%20menggunakan%20aplikasi%20ini?" style="font-weight: 500;"><i class="fa fa-whatsapp"></i>
                                    Whatsapp Admin
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="material-icons">favorite</i> by Tim PKL Filkom UB.
                        <a href="https://api.whatsapp.com/send?phone=6285933167404&text=Bagaimana%20cara%20menggunakan%20aplikasi%20ini?" class="float" target="_blank"><i class="fa fa-whatsapp my-float"></i></a>
                    </div>
                </div>
            </footer>
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/core/jquery.min.js') }} "></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }} "></script>
    <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js') }} "></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }} "></script>
    <!-- Plugin for the momentJs  -->
    <script src="{{ asset('assets/js/plugins/moment.min.js') }} "></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{ asset('assets/js/plugins/sweetalert2.js') }} "></script>
    <!-- Forms Validations Plugin -->
    <script src="{{ asset('assets/js/plugins/jquery.validate.min.js') }} "></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.2') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();

        });
    </script>

    <!-- JS Drag n Drop -->
    <script src="{{ asset('/js/dragndrop.js') }}"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweetalert::alert')


</body>

</html>