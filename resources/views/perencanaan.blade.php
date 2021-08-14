@extends('main')

@section('title', 'Perencanaan')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Perencanaan</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-map"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="/perencanaan/proses" method="POST" enctype="multipart/form-data">
        <div>
            <select class="custom-select" name="projek_id">
                @foreach($projek as $projek)
                @if($projek->user_id==Auth::user()->id)
                <option value="{{$projek->id}}">{{$projek->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="row" style="padding-bottom:32px">
            <!-- Card Status-->

            <div class="col-sm-4">

                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0  text-primary">Status Perencanaan</h6>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th width=60%>File Name</th>
                                    <th width=40%>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matriks->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)

                                <tr>
                                    <td>
                                        Matriks
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        Menunggu Review
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach

                                @foreach($rab->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        RAB
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        Menunggu Review
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach

                                @foreach($kak->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        KAK
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        Menunggu Review
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach

                                @foreach($proposal->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        Proposal
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        Menunggu Review
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach

                                @foreach($analisis->where('user_id', Auth::user()->id) as $f)
                                @if($loop->first)
                                <tr>
                                    <td>
                                        Analisis
                                    </td>
                                    @if ($f->status==1)
                                    <td>
                                        <span href="">Menunggu Review</span>
                                    </td>
                                    @elseif($f->status==2)
                                    <td>
                                        Revisi
                                    </td>
                                    @elseif($f->status==3)
                                    <td>
                                        Diterima
                                    </td>
                                    @endif
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <!-- End Of Card Laporan -->

            <!-- Card Upload-->
            <div class="col-sm-6">

                <div class="card shadow h-100">
                    <div class="card-header py-3">
                        <h6 class="m-0  text-primary">Kelengkapan Document</h6>
                    </div>
                    <div class="card-body">

                        {{ csrf_field() }}
                        <div class="row table table-borderless" style="padding-left: 16px;">
                            <table>
                                <tr>
                                    <td style="width: 35%">
                                        <a>File Matriks</a>
                                    </td>
                                    <td>
                                        <input type="file" name="matriks">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a>File RAB</a>
                                    </td>
                                    <td>
                                        <input type="file" name="rab">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a>File KAK</a>
                                    </td>
                                    <td>
                                        <input type="file" name="kak">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a>File Proposal</a>
                                    </td>
                                    <td>
                                        <input type="file" name="proposal">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a>File Analisis Resiko</a>
                                    </td>
                                    <td>
                                        <input type="file" name="analisis">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="row" style="padding-left: 16px;">
                            <button type="submit" class="btn btn-primary "><i class="menu-icon fa fa-upload"></i> Upload</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Revisi-->
            <div class="col-sm-2">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0  text-primary">Revisi</h6>
                    </div>
                    <div class="card-body">
                        <a href="/revisi" class="btn btn-primary">Ajukan Revisi</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- Card History -->
        <div class="card card-body">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" href="#matriks" role="tab" data-toggle="tab">Matriks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#rab" role="tab" data-toggle="tab">RAB</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#kak" role="tab" data-toggle="tab">KAK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#proposal" role="tab" data-toggle="tab">Proposal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#analisis" role="tab" data-toggle="tab">Analisis Resiko</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="tab-content" id="nav-tabContent">
                        <!-- Matriks -->
                        <div class="tab-pane fade show active" id="matriks" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div class="modal-body">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th width=10%>No.</th>
                                            <th width=50%>File Name</th>
                                            <th width=20%>Date Upload</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($matriks as $f)
                                        @if($f->user_id==Auth::user()->id)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name }}</td>
                                                <td>{{ $f->created_at }}</td>
                                                <td class="float-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i> Download
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- RAB -->
                        <div class="tab-pane fade" id="rab" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="modal-body">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th width=10%>No.</th>
                                            <th width=50%>File Name</th>
                                            <th width=20%>Date Upload</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($rab as $f)
                                        @if($f->user_id==Auth::user()->id)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name }}</td>
                                                <td>{{ $f->created_at }}</td>
                                                <td class="float-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i> Download
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- KAK -->
                        <div class="tab-pane fade" id="kak" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="modal-body">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th width=10%>No.</th>
                                            <th width=50%>File Name</th>
                                            <th width=20%>Date Upload</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($kak as $f)
                                        @if($f->user_id==Auth::user()->id)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration}}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name }}</td>
                                                <td>{{ $f->created_at }}</td>
                                                <td class="float-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i> Download
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Proposal -->
                        <div class="tab-pane fade" id="proposal" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <div class="modal-body">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th width=10%>No.</th>
                                            <th width=50%>File Name</th>
                                            <th width=20%>Date Upload</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($proposal as $f)
                                        @if($f->user_id==Auth::user()->id)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name }}</td>
                                                <td>{{ $f->created_at }}</td>
                                                <td class="float-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i> Download
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- Analisis -->
                        <div class="tab-pane fade" id="analisis" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <div class="modal-body">
                                <table class="table" id="table">
                                    <thead>
                                        <tr>
                                            <th width=10%>No.</th>
                                            <th width=50%>File Name</th>
                                            <th width=20%>Date Upload</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi dari keluaran data -->
                                        @foreach($analisis as $f)
                                        @if($f->user_id==Auth::user()->id)
                                        <tr>
                                            <form action="/perencanaan/download" method="GET">
                                                <td>{{ $loop->iteration }}</td>
                                                <input type="hidden" name="path" value=" {{$f->path}}">
                                                <td>{{ $f->name }}</td>
                                                <td>{{ $f->created_at }}</td>
                                                <td class="float-right">
                                                    <button type="submit" class="btn btn-primary">
                                                        <i class="menu-icon fa fa-download"></i> Download
                                                    </button>
                                                </td>
                                            </form>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- /.container-fluid -->

</div>
<!-- script -->
<script>
    $('#table').DataTable();

    $(".nav a").on("click", function() {
        $(".nav a").removeClass("active");
        $(this).addClass("active");
    })
</script>

@endsection