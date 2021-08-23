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
    @if (session('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span>
            {{session('success')}}
    </div>
    @endif
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <h3 class="m-0  text-primary">Template</h3>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered" id="table-datatables">
                    <thead>
                        <tr>
                            <th hidden>id</th>
                            <th width="1%">No.</th>
                            <th width="30%">Nama File</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($file as $f)
                        <tr>
                            <td hidden="true">{{ $f->id }}</td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $f->nama_file }}</td>
                            <td>
                                <a href="javascript:void(0)" id="deletebtn" class="btn btn-danger btn-xs btn-hapus" data-id="{{$f->id}}" ><i class="fa fa-trash-o"></i> Hapus </a>
                                
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="" class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i>Tambah Template</a>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Ini adalah Bagian Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Template</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Ini adalah Bagian Body Modal -->

                <form action="{{ url('admin/template') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="nama_file" class="col-md-4 col-form-label text-md-right">{{ __('Pilih File') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="nama_file" id="nama_file" required>
                            </div>
                        </div>
                    </div>
                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>


            </div>
        </div>
    </div>

     <!-- Modal Confirm Delete -->
     <div class="modal fade" id="deletemodal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Pengumuman</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form id="deletemodalform" method="post" class="d-inline">
                @method('delete')
                @csrf
                <div class="modal-body">
                <input type="text" hidden id="inputjudul">
                <input type="text" hidden id="inputid">
                <h5><strong>Yakin ingin hapus data ini?</strong></h5>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-danger btn-xs hapus-btn">Hapus Data</button>
                </div>
            </form>
           
          </div>
        </div>
    </div>
      <!-- End Modal Delete Pengumuman -->
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
        $(document).ready( function () {
        $('#table-datatables').DataTable();
    } );
    
    </script>

<script>
    $(document).ready( function () {
        $('#table-datatables').on('click', '.btn-hapus', function(){
        const id = $(this).attr('data-id');
        console.log(id);
        // var col2=currentRow.find("td:eq(1)").text();
        // var datajudul=col2;

        $tr=$(this).closest("tr");
        var dataid = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        
        // $('#inputjudul').val(datajudul);
        $('#inputid').val(dataid[0]);
        $('#deletemodalform').attr('action','admin/template/'+dataid[0]);
        $('#deletemodal').modal('show');
        });
    });
</script>
    
@endsection