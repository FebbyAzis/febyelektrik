@extends('layout.app')
@section('content')  


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- @dd($kategori_barang) --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" 
        data-toggle="modal" data-target="#exampleModal"><i
        class="fas fa-plus fa-sm text-white-50"></i>&nbsp;
            Tambah Barang
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
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">QTY</th>
                                <th class="text-center">Banyaknya</th>
                                <th class="text-center">Harga Beli</th>
                                <th class="text-center">Harga Jual</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barang as $no=>$b)
                                <tr>
                                    <td class="text-center">{{$no+1}}</td>
                                    <td>{{$b->nama_barang}}</td>
                                    <td>{{$b->qty}}</td>
                                    <td>{{$b->banyaknya}}pcs</td>
                                    <td class="text-right">Rp. {{ number_format($b->harga_beli ,0, ',', '.') }}</td>
                                    <td class="text-right">Rp. {{ number_format($b->harga_jual ,0, ',', '.') }}</td>
                                    <td class="text-center">
                                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" 
                                            data-toggle="modal" data-target="#exampleModal1{{$b->id}}">
                                            Edit
                                        </button>
                                        <button type="button" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" 
                                            data-toggle="modal" data-target="#exampleModal2{{$b->id}}">
                                            Hapus
                                        </button>
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
<form action="{{url('/tambah-barang')}}" method="POST">
    @csrf
    @method('POST')
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Nama Barang</label>
                    <input type="text" class="form-control" id="exampleInputText1" name="nama_barang" placeholder="..." required>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">QTY</legend>
                      <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="DUS" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      DUS
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PAK" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      PAK
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KRG" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      KRG
                                    </label>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PCS" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      PCS
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KG" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      KG
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="SET" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      SET
                                    </label>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="ROL" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      ROL
                                    </label>
                                  </div>
                                  <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="LSN" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      LSN
                                    </label>
                                  </div>
                            </div>
                            
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Banyaknya</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="exampleInputText1" name="banyaknya" placeholder="..." required>
                        </div>
                        <div class="col-md-6 mt-2">
                            PCS
                        </div>
                    </div>
                    
                </div>
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Harga Beli</label>
                    <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="..." required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Harga Jual</label>
                    <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="..." required>
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


@foreach ($barang as $item)
    

<form action="{{url('edit-barang/'. $item->id)}}" method="POST">
    @csrf
    @method('PUT')
<div class="modal fade" id="exampleModal1{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            
            <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Nama Barang</label>
                    <input type="text" class="form-control" id="exampleInputText1" name="nama_barang" placeholder="..." value="{{$item->nama_barang}}" required>
                </div>
                <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-form-label col-sm-2 pt-0">QTY</legend>
                      <div class="col-sm-10">
                        <div class="row">
                            <div class="col-md-4">
                                @if ($item->qty == "DUS")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="DUS" checked required>
                                    <label class="form-check-label" for="gridRadios1">
                                      DUS
                                    </label>
                                  </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="DUS" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      DUS
                                    </label>
                                  </div>
                                @endif

                                @if ($item->qty == "PAK")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PAK" checked required>
                                    <label class="form-check-label" for="gridRadios1">
                                      PAK
                                    </label>
                                  </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PAK" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      PAK
                                    </label>
                                  </div>
                                @endif

                                @if ($item->qty == "KRG")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KRG" checked required>
                                    <label class="form-check-label" for="gridRadios1">
                                      KRG
                                    </label>
                                  </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KRG" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      KRG
                                    </label>
                                  </div>
                                @endif

                                
                            </div>
                            <div class="col-md-4">
                                @if ($item->qty == "PCS")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PCS" checked required>
                                    <label class="form-check-label" for="gridRadios1">
                                      PCS
                                    </label>
                                  </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="PCS" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      PCS
                                    </label>
                                  </div>
                                @endif
                                  
                                @if ($item->qty == "KG")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KG" checked required>
                                    <label class="form-check-label" for="gridRadios1">
                                      KG
                                    </label>
                                  </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="KG" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      KG
                                    </label>
                                  </div>
                                @endif

                                @if ($item->qty == "SET")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="SET" checked required>
                                    <label class="form-check-label" for="gridRadios1">
                                      SET
                                    </label>
                                  </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="SET" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      SET
                                    </label>
                                  </div>
                                @endif
                                  
                            </div>
                            <div class="col-md-4">
                                @if ($item->qty == "ROL")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="ROL" checked required>
                                    <label class="form-check-label" for="gridRadios1">
                                      ROL
                                    </label>
                                  </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="ROL" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      ROL
                                    </label>
                                  </div>
                                @endif
                                  
                                @if ($item->qty == "LSN")
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="LSN" checked required>
                                    <label class="form-check-label" for="gridRadios1">
                                      LSN
                                    </label>
                                  </div>
                                @else
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="qty" id="gridRadios1" value="LSN" required>
                                    <label class="form-check-label" for="gridRadios1">
                                      LSN
                                    </label>
                                  </div>
                                @endif
                                  
                                 
                            </div>
                            
                        </div>
                      </div>
                    </div>
                  </fieldset>
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Banyaknya</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="exampleInputText1" name="banyaknya" placeholder="..." value="{{$item->banyaknya}}" required>
                        </div>
                        <div class="col-md-6 mt-2">
                            PCS
                        </div>
                    </div>
                    
                </div>
                  <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Harga Beli</label>
                    <input type="text" class="form-control" id="harga_beli_edit" name="harga_beli" placeholder="..." value="{{ number_format($item->harga_beli ,0, ',', '.') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleInputText1">Harga Jual</label>
                    <input type="text" class="form-control" id="harga_jual_edit" name="harga_jual" placeholder="..." value="{{ number_format($item->harga_jual ,0, ',', '.') }}" required>
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

@foreach ($barang as $item)
<form action="{{url('hapus-barang/'. $item->id)}}" method="POST">
    @csrf
    @method('DELETE')
<div class="modal fade" id="exampleModal2{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <p>Apakah anda yakin ingin menghapus barang <b>{{$item->nama_barang}}</b>?</p>
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