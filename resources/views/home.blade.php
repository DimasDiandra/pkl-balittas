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
                <div class="card shadow" style="height: 90vh;">
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
                <!-- template -->
                <div class="column">
                    <div class="card shadow" style="height: 60vh;">
                        <div class="card-header py-3">
                            <h6 class="m-0 text-primary">Report Template</h6>
                        </div>
                        <div class="card-body">
                            <p>Template disini
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End of Main Content -->
</div>

@endsection