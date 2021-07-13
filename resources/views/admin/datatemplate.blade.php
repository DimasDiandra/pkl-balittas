@extends('admin/main')

@section('title', 'Data Template')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Template</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active"><i class="fa fa-dashboard"></i></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="content mt-3">

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <p>Tambahkan Template</p>
              <form class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <div class="col-md-10">
                    <input type="file" name="myFile" class="filestyle" data-icon="false">
                  </div>
                  <div class="col-md-2">
                    <input type="submit" name="upload" class="btn btn-primary" value="Upload">
                  </div>
                </div>
              </form>
            </div>
        </div>
        <div>
            <table class="table table-striped table-hover">
                <tr>
                  <th>NO.</th>
                  <th>FILE NAME</th>
                  <th>HAPUS</th>
                </tr>
            </table>
        </div>
        
    </div>

</div>
@endsection

