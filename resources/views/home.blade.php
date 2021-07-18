@extends('main')

@section('title', 'Home')

<div class="bg-image"></div>
@section('content')

<div class="bg-box">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="row justify-content-center h-100">
            <!-- template -->
            <div class="column w-40 p-r-16">
                <div class="card shadow" style="height: 67vh;">
                    <div class="card-header py-3">
                        <h6 class="m-0 text-primary">Pengumuman</h6>
                    </div>
                    <div class="card-body">
                        <p>Pengumuman disini
                        </p>
                    </div>
                </div>
            </div>
            <div class="column w-30">
                <!-- perencanaan -->
                <div class="column">
                    <div class="card bg-c-blue order-card shadow mb-4">
                        <div class="card-block">
                            <a href="/upload" class="stretched-link">
                                <h4 class="m-b-20">Perencanaan</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- report  -->
                <div class="column">
                    <div class="card bg-c-blue order-card shadow mb-4">
                        <div class="card-block">
                            <a href="/report" class="stretched-link">
                                <h4 class="m-b-20">Report</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- revisi -->
                <div class="column">
                    <div class="card bg-c-blue order-card shadow mb-4">
                        <div class="card-block">
                            <a href="/revisi" class="stretched-link">
                                <h4 class="m-b-20">Revisi</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- template -->
                <div class="column">
                    <div class="card bg-c-blue order-card shadow mb-4">
                        <div class="card-block">
                            <a href="#" class="stretched-link" data-toggle="modal" data-target="#myModal">
                                <h6 class="m-b-20">Download Template</h6>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- <div class="column">
                    <div class="card shadow" style="height: 60vh;">
                        <div class="card-header py-3">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Download</a>     
                        </div>
                        <div class="card-body">
                            <p>Template disini
                            </p>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
    <!-- End of Main Content -->
</div>
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
                <table class="table table-bordered table-striped">
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
							<td>{{ $loop->iteration }}</td>
							<td>{{ $f->nama_file }}</td>
                            <td class="text-center"><a href="" ><i class="btn btn-success">Download</i></a></td>
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
@endsection