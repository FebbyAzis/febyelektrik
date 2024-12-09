@extends('layout.app')
@section('content')  


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- @dd($kategori_barang) --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Faktur</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" 
        data-toggle="modal" data-target="#exampleModal"><i
        class="fas fa-plus fa-sm text-white-50"></i>&nbsp;
            Tambah Faktur
          </button>
        
    </div>

    <!-- Content Row -->
    @if (session('Success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('Success')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (session('Successs'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('Successs')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (session('Successss'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{session('Successss')}}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">No Faktur</th>
                                <th class="text-center">Nama Pelanggan/Toko</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faktur as $no=>$p)
                                <tr>
                                    <td class="text-center">{{$no+1}}</td>
                                    <td>{{$p->tanggal}}</td>
                                    <td>{{$p->no_faktur}}</td>
                                    <td>{{$p->data_pelanggan->nama_toko}}</td>
                                    
                                   
                                    <td class="text-center">
                                        <a href="{{url('invoice/'. $p->id)}}" type="button" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                                            Lihat
                                        </a>
                                        
                                      
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    <!-- Content Row -->



</div>
<!-- /.container-fluid -->


<!-- Modal -->
<form action="{{url('/tambah-faktur')}}" method="POST">
    @csrf
    @method('POST')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Faktur</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Pelanggan/Toko</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="data_pelanggan_id" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach($pelanggan as $pelanggan)
                            <option value="{{ $pelanggan->id }}">{{ $pelanggan->nama_toko }}</option>
                        @endforeach
                    </select>
                  </div>
                <div class="form-group">
                    <label class="form-label" for="exampleInputText1">No Faktur</label>
                    <input type="text" class="form-control" id="exampleInputText1" name="no_faktur" placeholder="..." required>
                </div>
                
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Tanggal</label>
                    <input type="date" class="form-control" id="" name="tanggal" placeholder="..." required>
                </div>
   
                </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="Submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>


@foreach ($faktur as $item)
    

<form action="{{url('edit-pelanggan/'. $item->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Nama Pelanggan/Toko</label>
                    <input type="text" class="form-control" id="exampleInputText1" name="nama_toko" value="" placeholder="..." required>
                </div>
                
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1">No Telepon</label>
                    <input type="text" class="form-control" id="" name="no_tlp" value="" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Alamat</label>
                    <input type="text" class="form-control" id="" name="alamat" value="" placeholder="..." required>
                </div>
                </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="Submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endforeach

@foreach ($faktur as $item)
<form action="{{url('hapus-pelanggan/'. $item->id)}}" method="POST">
    @csrf
    @method('DELETE')
<div class="modal fade" id="exampleModal2{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Pelanggan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <p>Apakah anda yakin ingin menghapus pelanggan/toko <b></b>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
          <button type="Submit" class="btn btn-primary">Ya</button>
        </div>
      </div>
    </div>
  </div>
</div>
</form> 
@endforeach

<script type="text/javascript">
    var harga_beli = document.getElementById('harga_beli');
    harga_beli.addEventListener('keyup', function(e)
    {
        harga_beli.value = formatRupiah(this.value, 'Rp. ');
    });
    var harga_jual = document.getElementById('harga_jual');
    harga_jual.addEventListener('keyup', function(e)
    {
        harga_jual.value = formatRupiah(this.value, 'Rp. ');
    });

    var harga_beli_edit = document.getElementById('harga_beli_edit');
    harga_beli_edit.addEventListener('keyup', function(e)
    {
        harga_beli_edit.value = formatRupiah(this.value, 'Rp. ');
    });
    var harga_jual_edit = document.getElementById('harga_jual_edit');
    harga_jual_edit.addEventListener('keyup', function(e)
    {
        harga_jual_edit.value = formatRupiah(this.value, 'Rp. ');
    });
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
    }
    </script>

@endsection