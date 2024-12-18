@extends('layout.app')
@section('content')
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        {{-- @dd($kategori_barang) --}}
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Invoice</h1>


        </div>

        <!-- Content Row -->
        @if (session('Success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Success') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('Successs'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Successs') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session('Successss'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('Successss') }}.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabel Data Faktur Pelanggan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <p>Nama Pelanggan/Toko</p>
                        <p>No Telepon</p>
                        <p>Alamat</p>
                    </div>
                    <div class="col-md-1 text-end">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                    <div class="col-md-8">
                        <p>{{ $detail->nama_toko }}</p>
                        <p>{{ $detail->no_tlp }}</p>
                        <p>{{ $detail->alamat }}</p>
                    </div>
                    
                </div>
                <hr class="sidebar-divider">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Tanggal</th>
                                <th class="text-center">No Faktur</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach ($faktur as $no=>$item)
                            
                                <tr>
                                    <td class="text-center">{{ $no + 1 }}</td>
                                    <td class="text-center">{{date("d/M/Y", strtotime($item->tanggal));}}</td>

                                    <td class="text-center">{{ $item->no_faktur }}</td>
                                    
                                    <td class="text-center">
                                        <a href="{{ url('detail-faktur-pelanggan/' . $item->id) }}" type="button"
                                            class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
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

@endsection

@section('js')
    <script type="text/javascript">
        var harga_beli = document.getElementById('harga_beli');
        harga_beli.addEventListener('keyup', function(e) {
            harga_beli.value = formatRupiah(this.value, 'Rp. ');
        });
        var harga_jual = document.getElementById('harga_c');
        harga_jual.addEventListener('keyup', function(e) {
            harga_jual.value = formatRupiah(this.value, 'Rp. ');
        });

        var harga_beli_edit = document.getElementById('harga_beli_edit');
        harga_beli_edit.addEventListener('keyup', function(e) {
            harga_beli_edit.value = formatRupiah(this.value, 'Rp. ');
        });
        var harga_jual_edit = document.getElementById('harga_jual_edit');
        harga_jual_edit.addEventListener('keyup', function(e) {
            harga_jual_edit.value = formatRupiah(this.value, 'Rp. ');
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? rupiah : '');
        }
    </script>
@endsection

