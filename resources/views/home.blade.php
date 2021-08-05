@extends('main')

@section('title', 'Home')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Home</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-home"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid" style="padding-top: 16px;">
    <div class="row">
        <!-- notifikasi -->
        <div class="col-sm-8">
            <div class="card shadow" style=" height: 30vh; margin-bottom: 32px; ">
                <div class=" card-header py-3">
                    <h6 class="m-0 text-primary">Notifikasi</h6>
                </div>
                <div class="card-body overflow-auto">
                    <div class="table table-borderless">
                        <table>
                            @forelse($user->notifications as $notification)
                            <tr>
                                <td style="width: 15%;">
                                    {{substr($notification->created_at,2,8)}}
                                </td>
                                <td style="width: 80%;">
                                    Status file
                                    <a style="font-weight: 700;">{{$notification->data['name']}}</a>
                                    diubah menjadi
                                    @if ($notification->data['status'] == 0)
                                    <a style="font-weight: 700;">
                                        Menunggu Review
                                    </a>
                                    @elseif($notification->data['status']==1)
                                    <a style="font-weight: 700;">
                                        Revisi
                                    </a>
                                    @elseif($notification->data['status']==2)
                                    <a style="font-weight: 700;">
                                        Diterima
                                    </a>
                                    @endif
                                </td>
                                <td style="width: 10%;">
                                    @if ($notification->data['status'] == 0)
                                    <a href="" class="float-right" style="color: blue;"> <i class="fa fa-history"></i></a>
                                    @elseif($notification->data['status']==1)
                                    <a href="" class="float-right" style="color: red;"> <i class="fa fa-ban"></i></a>
                                    @elseif($notification->data['status']==2)
                                    <a href="" class="float-right" style="color: green;"> <i class="fa fa-check"></i></a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
            <!-- progress -->
            <div class="card shadow overflow-auto" style=" height: 50vh; margin-bottom: 32px; ">
                <div class=" card-header py-3">
                    <h6 class="m-0 text-primary">Progres</h6>
                </div>
                <div class="card-body">
                    @foreach($projek as $projek)
                    <div style="padding-bottom: 16px;">
                        <h6 style="font-weight: 600;">{{$projek->name}}</h6>
                        <h7>{{
                            $users = trim(
                            $user->where('id',$projek->user_id)->pluck('name'),
                            '[""]')
                        }}</h7>
                        <div class="progress" style="height:8px">
                            <div class="progress-bar" role="progressbar" style="width: {{$projek->all_status}}%"></div>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>


        </div>
        <!-- col 2 -->
        <div class="col">
            <!-- template -->
            <div class="card shadow" style="height: 30vh; margin-bottom: 32px; ">
                <div class="card-header py-3">
                    <h6 class="m-0 text-primary">Template Download</h6>
                </div>
                <div class="card-body table-wrapper-scroll-y scrollbar">
                    <table>
                        @foreach($file as $f)
                        <tr>
                            <form action="/home/download" method="GET">
                                <input type="hidden" name="path" value=" {{$f->path}}">
                                <td>{{ $f->nama_file }}</td>
                                <td style="width: 10%;">
                                    <button type="submit" class="btn">
                                        <i class="menu-icon fa fa-download" style="color: blue;"></i>
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <!-- pengumuman -->
            <div class="card shadow" style="height: 50vh; ">
                <div class="card-header py-3">
                    <h6 class="m-0 text-primary">Pengumuman</h6>
                </div>
                <div class="card-body">
                    <table style="border: 0;">
                        @foreach($pengumuman as $f)
                        <tr>
                            <td style="padding-bottom:8px; cursor:pointer">
                                <a data-toggle="modal" data-target="#pengumumanModal" data-id="{{ $f->id }}" class="text-primary detail-btn">
                                    {{ $f->judul }}
                                </a>
                            </td>
                            <td style="padding-bottom:8px; cursor:pointer; width:20%">
                                <a data-toggle="modal" data-target="#pengumumanModal" data-id="{{ $f->id }}" class="detail-btn">
                                    {{$date= substr(
                                     $f->created_at ,2,8
                                    )}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Main Content -->

<!-- Modal Download -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Ini adalah Bagian Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Download Template</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Ini adalah Bagian Body Modal -->
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="templateTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>File Name</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Isi dari keluaran data -->
                        @foreach($file as $f)
                        <tr>
                            <form action="/home/download" method="GET">
                                <td>{{ $loop->iteration }}</td>
                                <input type="hidden" name="path" value=" {{$f->path}}">
                                <td>{{ $f->nama_file }}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="menu-icon fa fa-download"></i> Download
                                    </button>
                                </td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Ini adalah Bagian Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>

<!-- Modal Pengumuman -->
<div id="pengumumanModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Ini adalah Bagian Header Modal -->
            <div class="modal-header">
                <h4 class="modal-title">Pengumuman</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Ini adalah Bagian Body Modal -->
            <div class="modal-body">
                <h6 id="judul"></h6>
                <br>
                <p id="isi">
                </p>
            </div>

            <!-- Ini adalah Bagian Footer Modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div>

<script>
    // $('#templateTable').DataTable();

    //dynamic modal
    jQuery(document).ready(function() {
        $('.detail-btn').click(function() {
            const id = $(this).attr('data-id');
            console.log(id)
            $.ajax({
                url: '/home/pengumuman/' + id,
                type: 'GET',
                data: {
                    'id': id
                },
                success: function(data) {
                    console.log(data);
                    $('#judul').html(data.judul);
                    $('#isi').html(data.isi_pengumuman);
                }
            });
        });
    });
</script>

@endsection