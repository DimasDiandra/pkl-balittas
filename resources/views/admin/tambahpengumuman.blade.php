@extends('admin/main')

@section('title', 'Pengumuman')

@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Pengumuman</h1>
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
                <h3 class="m-0  text-primary">Pengumuman</h3>
            </div>

            <div class="card-body table-responsive" >
                <table class="table table-borderless" id="table-datatables">
                    <thead>
                        <tr>
                            <th width="1%">No.</th>
                            <th width="40%">Judul</th>
                            <th width="30%">Pengumuman</th>
                            <th width="20%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengumuman as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->judul }}</td>
                            <td>{{ $data->isi_pengumuman }}</td>
                            <td class="text-center">
                                <a href="{{ url('admin/pengumuman/' .$data->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit" style="color: white;"><i class="menu-icon fa fa-pencil"></i> Edit</a>

                                <a href="javascript:void(0)" class="btn btn-danger btn-xs btn-hapus" data-toggle="modal" data-target="#deletemodal" id="delete"><i class="fa fa-trash-o"></i> Hapus </a>
                            </td>
                            <td></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Pengumuman</button>
            </div>
        </div>

    </div>
    <!-- Modal -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Ini adalah Bagian Header Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengumuman</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Ini adalah Bagian Body Modal -->
                <form action="{{ url('admin/pengumuman') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Pengumuman</label>
                            <input type="text" name="judul" class="form-control" id="judulpengumuman" placeholder="Isikan Judul Pengumuman Disini" required oninvalid="this.setCustomValidity('Masukkan Judul Pengumuman Terlebih Dahulu')" oninput="setCustomValidity('')">
                        </div>
                        <div class="mb-3">
                            <label for="isi_pengumuman" class="form-label">Isi Pengumuman</label>
                            <textarea name="isi_pengumuman" class="form-control" id="isi_pengumuman" placeholder="Isikan Pengumuman Disini" required oninvalid="this.setCustomValidity('Masukkan Isi Pengumuman Terlebih Dahulu')" oninput="setCustomValidity('')"></textarea>
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
    <!-- End Modal Tambah Pengumuman -->

    <!-- Modal Confirm Delete -->
    <div class="modal fade" id="deletemodal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Hapus Pengumuman</h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
                <div class="modal-body">
                <input type="text"  id="inputjudul">
                <input type="text"  id="inputid">
                <h5><strong>Yaking ingin hapus data ini?</strong></h5>
                </div>
            @foreach($pengumuman as $dataa)
            <form  action="{{ url('admin/pengumuman/' .$dataa->id ) }}" id="deletemodalform" method="post" class="d-inline" >
                @method('delete')
                @csrf
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button href="{{ url('pengumuman/'.$dataa->id) }}" type="submit" class="btn btn-danger btn-xs">Hapus Data</button>
                </div>
            </form>
            @endforeach
          </div>
        </div>
    </div>
      <!-- End Modal Delete Pengumuman -->

</div>

<script >
  $(document).ready(function() {
    $('#table-datatables').DataTable();

    $('#table-datatables').on('click', '.btn-hapus', function){
        var col2=currentRow.find("td:eq(1)").text();
        var datajudul=col2;

        $tr=$(this).closest("tr");
        var dataid=$tr.children("td").map(function(){
            return $(this).text();
        }).get();
        $('#inputjudul').val(datajudul);
        $('#inputid').val(dataid[0]);
        $('#deletemodalform').attr('action','/pengumuman/'+dataid[0]);
        $('#deletemodal').modal('show');
    }
} );
</script>
@endsection